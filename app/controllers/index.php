<?php

use PlayTv\Utils\Feature;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller used to display Play TV homepage.
 *
 * @author PLAYMEDIA
 */
class index_controller extends ppl_app_controller
{
    private function get_superfeatured_broadcasts()
    {
        // playtv.fr
        $superfeatured_broadcasts = null;
        if (true === $this->container['is_website_fr']) {
            // carrousel
            $superfeatured_broadcasts = $this->getSdk()['services.broadcast']->getSuperFeaturedBroadcast($this->container['broadcasts.featured']);
            $superfeatured_broadcasts = array_slice($superfeatured_broadcasts, 0, 5);

            // Closure to add images.sf_large_image key
            $exists_sfp_large_image = function ($broadcast) {
                $broadcast['program']['images']['sf_image_large'] = null;

                if (false === $broadcast['program']['images']['sf_image']) {
                    return;
                }

                $sfp_large = str_replace('sfp.', 'sfplarge.', $broadcast['program']['images']['sf_image']);
                $sfp_large = str_replace($this->container['static_base_url'], '', $sfp_large);

                if (file_exists($this->config->custom->static->mounted_path.$sfp_large)) {
                    $broadcast['program']['images']['sf_image_large'] = $this->container['static_base_url'].$sfp_large;
                }

                return $broadcast;
            };

            $superfeatured_broadcasts = array_map($exists_sfp_large_image, $superfeatured_broadcasts);
        }

        return $superfeatured_broadcasts;
    }

    /**
     * Display Play TV homepage.
     */
    public function index_action(Request $request)
    {
        $this->set_page_title_trans('homepage', [], false);
        $this->set_page_description_trans('homepage');
        $this->set_page_keywords_trans('homepage');

        if ($this->isMobileLayout()) {
            $broadcasts_live = $this->broadcasts_live();

            return $this->render(array(
                'broadcasts_live' => $broadcasts_live,
            ));
        }

        // Order matters, it's how it's displayed
        $thumbnails = [];
        $thumbnails[] = 'broadcasts-live';
        $thumbnails[] = 'broadcasts-tonight';
        if ($this->has_feature(Feature::CATCHUP_TV)) {
            $thumbnails[] = 'replays-news';
            $thumbnails[] = 'replays-last';
        }
        $thumbnails[] = 'channels-news';
        $thumbnails[] = 'channels-arabic';
        $thumbnails[] = 'channels-thematic';
        $thumbnails[] = 'channels-local';
        $thumbnails[] = 'channels-community';
        $thumbnails[] = 'channels-turk';

        // Check if ads are enabled
        $display_ads = $this->app()->adverts_are_visible();
        $is_connected = $this->container['is_connected'];
        $current_account = $this->container['account'];

        $ads_enabled = $display_ads && (!$is_connected || ($is_connected && !$current_account->isPremium()));

        $widgets = [];
        foreach ($thumbnails as $name) {
            $html = trim($this->thumbnails($name, $ads_enabled, $request->attributes->get('website')));

            if (empty($html)) {
                continue;
            }

            $widgets[] = $html;

            // When ads are enabled, only the 3 first rows should adapt
            if ($ads_enabled && count($widgets) >= 3) {
                $ads_enabled = false;
            }
        }

        return $this->render(array(
            'block_mosaic' => $this->mosaic('homepage'),
            'superfeatured_broadcasts' => $this->get_superfeatured_broadcasts(),
            'widgets' => $widgets,
        ));
    }
}
