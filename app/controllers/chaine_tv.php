<?php

use PlayTv\Utils\Channel as ChannelUtils;
use PlayTv\Utils\Product as ProductUtils;
use Playmedia\Component\Channel;

/**
 * Controller used to display tv channel informations pages.
 *
 * @author PLAYMEDIA
 */
class chaine_tv_controller extends ppl_app_controller
{
    /**
     * Display default channel information page.
     *
     * @param string $channel_alias The channel alias
     */
    public function index_action($channel_alias)
    {
        $infos = $this->getSdk()['services.channel']->show($this->getSdk()['utils.tool']->slugify($channel_alias));

        if (is_null($infos)) {
            return $this->createNotFoundResponse();
        }

        // Potential redirect
        if (!$this->isI18n() && urldecode($this->request->uri) !== $infos['channel_url']) {
            return $this->response->redirect($infos['channel_url'], 301);
        }

        $this->process_channel($infos);

        // Formatted description and previous name
        $infos['description'] = $this->getSdk()['utils.program']->summaryFormatted($infos['description']);
        $infos['previous_name'] = $this->getSdk()['utils.program']->summaryFormatted($infos['previous_name']);

        $toplive = $this->getSdk()['services.audience']->shareByHour($this->container['sdk_country_code'], 1, $channel_alias);
        $toplive = $toplive !== null ? array_shift($toplive) : null;

        $this->set_page_title($this->trans('chaine_tv.title', ['%channel%' => $infos['channel']], 'seo'));

        return $this->render(array(
            'infos' => $infos,
            'toplive' => $toplive,
        ));
    }

    /**
     * Display channel "en direct" program page.
     *
     * @param string $channel_alias The channel alias
     */
    public function en_direct_action($channel_alias)
    {
        $this->robots(false);

        $infos = $this->getSdk()['services.channel']->show($this->getSdk()['utils.tool']->slugify($channel_alias));

        if (is_null($infos)) {
            return $this->createNotFoundResponse();
        }

        $this->process_channel($infos);

        $block_broadcasts = $this->broadcasts($infos, 'live');

        $toplive = $this->getSdk()['services.audience']->shareByHour($this->container['sdk_country_code'], 1, $channel_alias);
        $toplive = $toplive !== null ? array_shift($toplive) : null;

        $this->set_page_title($this->trans('chaine_tv_en_direct.title', ['%channel%' => $infos['channel']], 'seo'));

        return $this->render(array(
            'infos' => $infos,
            'block_broadcasts' => $block_broadcasts,
            'toplive' => $toplive,
        ));
    }

    /**
     * Display channel "a suivre" program page.
     *
     * @param string $channel_alias The channel alias
     */
    public function a_suivre_action($channel_alias)
    {
        $this->robots(false);

        $infos = $this->getSdk()['services.channel']->show($this->getSdk()['utils.tool']->slugify($channel_alias));

        if (is_null($infos)) {
            return $this->createNotFoundResponse();
        }

        $this->process_channel($infos);

        $block_broadcasts = $this->broadcasts($infos, 'next');

        $toplive = $this->getSdk()['services.audience']->shareByHour($this->container['sdk_country_code'], 1, $channel_alias);
        $toplive = $toplive !== null ? array_shift($toplive) : null;

        $this->set_page_title($this->trans('chaine_tv_a_suivre.title', ['%channel%' => $infos['channel']], 'seo'));

        return $this->render(array(
            'infos' => $infos,
            'block_broadcasts' => $block_broadcasts,
            'toplive' => $toplive,
        ));
    }

    /**
     * Display channel "programmes tv" page.
     *
     * @param int    $channel_id    The channel id
     * @param string $channel_alias The channel alias
     * @param string $date          The date
     *
     * @throws ControllerException
     */
    public function programmes_tv_action($channel_id = null, $channel_alias = null, $date = null)
    {
        $infos = null;

        if (null !== $channel_id) {
            $infos = $this->getSdk()['services.channel']->show($channel_id);
            $channel_alias = $infos['alias'];
        } elseif (null !== $channel_alias) {
            $infos = $this->getSdk()['services.channel']->show($this->getSdk()['utils.tool']->slugify($channel_alias));
        }

        if (is_null($infos)) {
            return $this->createNotFoundResponse();
        }

        // Potential redirect
        if (!$this->isI18n() && is_null($date) && urldecode($this->request->uri) !== $infos['channel_broadcast_url']) {
            return $this->response->redirect($infos['channel_broadcast_url'], 301);
        }

        $this->process_channel($infos);

        $_programs = $this->load('programs');

        if (!is_null($date)) {
            // Date validation
            if (($this->isI18n() && !$_programs->is_valid_i18n_date($date)) || (!$this->isI18n() && !$_programs->is_valid_date($date))) {
                return $this->createNotFoundResponse();
            }
            // Convert date to timestamp
            $date = strtotime($date);
        } else {
            $date = $this->globals->get('date.today');
        }

        $block_broadcasts = $this->broadcasts($infos, 'daily', $date);

        $elapsed_time = time() - $date;

        if ($elapsed_time > 0 && $elapsed_time < 86400) {
            $page_title = $this->trans('chaine_tv_programmes.title', ['%channel%' => $infos['channel']], 'seo');
            $page_description = $this->trans('chaine_tv_programmes.meta.description', ['%channel%' => $infos['channel']], 'seo');
        } else {
            $trans_params = [
                '%channel%' => $infos['channel'],
                '%date%' => mb_strtolower($this->getSdk()['utils.tool']->readableDate($date)),
            ];
            $page_title = $this->trans('chaine_tv_programmes_date.title', $trans_params, 'seo');
            $page_description = $this->trans('chaine_tv_programmes_date.meta.description', $trans_params, 'seo');
        }

        $this->set_page_title($page_title);
        $this->set_page_description($page_description);

        $toplive = null;
        if (false === $this->isMobileLayout()) {
            $toplive = $this->getSdk()['services.audience']->shareByHour($this->container['sdk_country_code'], 1, $channel_alias);
            $toplive = $toplive !== null ? array_shift($toplive) : null;
        }

        return $this->render(array(
            'dates' => $_programs->get_dates_range(),
            'now_date' => $this->globals->get('date.today'),
            'selected_date' => $date,
            'infos' => $infos,
            'block_broadcasts' => $block_broadcasts,
            'toplive' => $toplive,
        ));
    }

    /**
     * Duplicate from television.php (need refacto).
     *
     * @param array $channel
     *
     * @return mixed
     */
    private function process_channel(&$channel)
    {
        // fake Component behaviour with fixed country code injection
        // requesting channel streams apart bc too much nested
        $streams = $this->getSdk()['services.channel.stream']->collection($this->container['sdk_country_code']);
        $this->getSdk()['services.channel']->setStreamsCollection($streams);

        $channel['is_radio'] = ChannelUtils::isRadio($channel);

        // override incriminating key
        $channel['has_streams'] = $this->getSdk()['services.channel']->hasStreams($channel['id']);

        // apply final streaming keys state
        $channel = Channel::getStreamingKeys(
            $channel,
            $this->container['sdk_country_code'],
            $this->container['account']
        );

        if (!empty($channel['products'])) {
            $products_alias = array_map(function ($product) {
                return $product['alias'];
            }, $channel['products']);

            $channel['is_freemium'] = in_array('pack-decouverte', $products_alias);

            $product_resolver = $this->getSdk()['channel.product_resolver'];
            $products = $product_resolver->getProducts($channel, $this->container['account']);

            $channel['products'] = ProductUtils::groupByType($products);
        } else {
            $channel['is_freemium'] = true;
            $channel['products'] = [];
        }
    }
}
