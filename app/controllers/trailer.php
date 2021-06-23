<?php

use Playmedia\Utils\Program as ProgramUtils;
use Playmedia\Utils\ParistreamToken;

/**
 * Display trailer.
 *
 * @author PLAYMEDIA
 */
class trailer_controller extends ppl_app_controller
{
    const TRAILER_APP_ZONE = 'desktop.trailer'; // Uniads zone id (Legacy)

    /**
     * HTTP layer outputing HTML for all channels live programs block.
     * Accept both standard and AJAX requests.
     */
    public function block_trailer_action($program_id)
    {
        $this->robots(false);

        $this->set_skin('minimal');

        $autoPlay = true;
        $client = $this->request->get_client();
        if ($client->is_tablet() || $client->is_mobile()) {
            $autoPlay = false;
        } elseif (isset($this->request->get['autoplay']) && 0 === (int) $this->request->get['autoplay']) {
            $autoPlay = false;
        }

        // Get Uniroll ad player configuration
        $unirollConfig = $this->checkUnirollAdCampaign(
            $this->convertZoneUid(self::TRAILER_APP_ZONE)
        );

        $html = $this->render(array(
            'program' => $this->getSdk()['services.program']->show($program_id),
            'autoplay' => $autoPlay,
            'uniroll' => $unirollConfig,
        ), 'controllers/trailer/index.twig');

        return $this->response->write($html);
    }

    /**
     * Iframe.
     */
    public function index_action($program_id)
    {
        $this->robots(false);

        $this->set_skin('minimal');

        $program = $this->getSdk()['services.program']->show($program_id);

        $program['trailer']['streams'] = [
            'flash' => htmlspecialchars_decode(ProgramUtils::getFlashTrailerStream($program)),
            'html5' => htmlspecialchars_decode(ProgramUtils::getHtml5TrailerStream($program)),
            'paristream' => $this->paristream($program), // Note: keep 'flash' and 'html5' for backward compatibility
        ];

        $client = $this->request->get_client();
        $isTabletOrMobile = ($client->is_tablet() || $client->is_mobile());

        // SPECIAL: if tablet or mobile, display trailer without ad (using legacy HTTP mp4 file url)
        // if ($isTabletOrMobile) {
        //     return $this->response->redirect($program['trailer']['streams']['html5']);
        // }

        $autoPlay = true;
        if ($isTabletOrMobile) {
            $autoPlay = false;
        } elseif (isset($this->request->get['autoplay']) && 0 === (int) $this->request->get['autoplay']) {
            $autoPlay = false;
        }
        // FIXME: autoplay also affect trailer iframe 'autoplay' query parameter (which should always be true ?)

        if ($isTabletOrMobile) {
            // SPECIAL: No advert on mobile or tablet
            $unirollConfig = $this->unirollNoAd(
                $this->convertZoneUid(self::TRAILER_APP_ZONE)
            );
        } else {
            // Get Uniroll ad player configuration
            $unirollConfig = $this->checkUnirollAdCampaign(
                $this->convertZoneUid(self::TRAILER_APP_ZONE)
            );
        }

        return $this->render(array(
            'program' => $program,
            'autoplay' => $autoPlay,
            'uniroll' => $unirollConfig,
            'isMobile' => $isTabletOrMobile, // Used by javascript to resize player to screen width with 16:9 ratio (ugly trick...)
        ));
    }

    public function embed_action($program_id)
    {
        $this->robots(false);

        $this->set_skin('minimal');

        $program = $this->getSdk()['services.program']->show($program_id);
        $program['trailer']['streams'] = [
            'flash' => htmlspecialchars_decode(ProgramUtils::getFlashTrailerStream($program)),
            'html5' => htmlspecialchars_decode(ProgramUtils::getHtml5TrailerStream($program)),
            'paristream' => $this->paristream($program), // Note: keep 'flash' and 'html5' for backward compatibility
        ];

        $render_datas = array(
            'program' => $program,
            'autoplay' => (bool) $this->request->get['autoplay'],
            // Default legacy trailer player size is 488 X 301
            'pWidth' => isset($this->request->get['w']) ? (int) $this->request->get['w'] : 488,
            'pHeight' => isset($this->request->get['h']) ? (int) $this->request->get['h'] : 301,
        );

        // 'flash' query parameter is set by Trailer 'index' backbone view in replaceIframeSrc() method
        $flashNotDetected = (isset($this->request->get['flash']) && 0 === (int) $this->request->get['flash']);

        // Note: $render_datas['format'] is superseded by 'paristream' (but kept for backward compatibility)
        $client = $this->request->get_client();
        if ($client->is_tablet() || $client->is_mobile() || $flashNotDetected) {
            $render_datas['format'] = 'html5';
            $render_datas['isMobile'] = true; // Used by javascript to resize player to screen width with 16:9 ratio (ugly trick...)
        } else {
            $render_datas['format'] = 'flash';
        }

        return $this->render($render_datas);
    }

    protected function paristream(array $program)
    {
        if (! isset($program['trailer']['ps_id'])) {
            return null;
        }

        $mediaId = $program['trailer']['ps_id'];

        // FIXME: get credentials from configuration ?
        $pst = new ParistreamToken(
            '7fbd6c58-0b78-43c7-9805-9b30e0084a1e',
            '16cVjPjbGy5vBlct4e2vxZl6TqpLgdsk8bSSm6a9Z04PttogsoZG8gcO8XQU494IorgTtFbFLjivLwsMhmd98boHBBsAsoTJRqjt'
        );

        return [
            'id' => $mediaId,
            'token' => $pst->getStreamToken($mediaId),
        ];
    }
}
