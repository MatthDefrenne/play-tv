<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * PlayDotTvUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class PlayDotTvUrlMatcher extends Symfony\Component\Routing\Matcher\UrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/uniads')) {
            // uniads_config
            if ($pathinfo === '/uniads/config/') {
                return array (  '_controller' => 'uniads_controller::config_action',  '_route' => 'uniads_config',);
            }

            // uniads_request
            if ($pathinfo === '/uniads/request/') {
                return array (  '_controller' => 'uniads_controller::request_action',  '_route' => 'uniads_request',);
            }

            // uniads_impression
            if ($pathinfo === '/uniads/impression/') {
                return array (  '_controller' => 'uniads_controller::impression_action',  '_route' => 'uniads_impression',);
            }

            // uniads_debug
            if ($pathinfo === '/uniads/debug/') {
                return array (  '_controller' => 'uniads_controller::debug_action',  '_route' => 'uniads_debug',);
            }

            // uniads
            if ($pathinfo === '/uniads/') {
                return array (  '_controller' => 'uniads_controller::index_action',  '_route' => 'uniads',);
            }

        }

        if (0 === strpos($pathinfo, '/television')) {
            // television_mosaique
            if (0 === strpos($pathinfo, '/television/mosaique') && preg_match('#^/television/mosaique/(?P<type>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'television_mosaique')), array (  '_controller' => 'television_controller::mosaique_action',));
            }

            // television_tooltip
            if (0 === strpos($pathinfo, '/television/tooltip') && preg_match('#^/television/tooltip/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'television_tooltip')), array (  '_controller' => 'television_controller::tooltip_action',  '_format' => 'json',));
            }

            if (0 === strpos($pathinfo, '/television/block-')) {
                // television_block_live_program_by_channel
                if (0 === strpos($pathinfo, '/television/block-live-program-by-channel') && preg_match('#^/television/block\\-live\\-program\\-by\\-channel/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'television_block_live_program_by_channel')), array (  '_controller' => 'television_controller::block_live_program_by_channel_action',));
                }

                // television_block_next_programs_by_channel
                if (0 === strpos($pathinfo, '/television/block-next-programs-by-channel') && preg_match('#^/television/block\\-next\\-programs\\-by\\-channel/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'television_block_next_programs_by_channel')), array (  '_controller' => 'television_controller::block_next_programs_by_channel_action',));
                }

            }

        }

        if (0 === strpos($pathinfo, '/live-tv')) {
            // television_streamable_filter
            if ($pathinfo === '/live-tv/my-package/') {
                return array (  '_controller' => 'television_controller::streamable_filter_action',  'bundle' => 'live',  '_route' => 'television_streamable_filter',);
            }

            // television_country_filter
            if (0 === strpos($pathinfo, '/live-tv/country') && preg_match('#^/live\\-tv/country/(?P<country_slug>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'television_country_filter')), array (  '_controller' => 'television_controller::country_action',  'bundle' => 'live',));
            }

        }

        // television_zapping
        if (0 === strpos($pathinfo, '/television/zapping') && preg_match('#^/television/zapping/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'television_zapping')), array (  '_controller' => 'television_controller::zapping_action',));
        }

        if (0 === strpos($pathinfo, '/live-tv')) {
            // television_channel_single
            if (preg_match('#^/live\\-tv/(?P<channel_id>[^/]++)/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'television_channel_single')), array (  '_controller' => 'television_controller::channel_action',  'bundle' => 'live',));
            }

            // television_index
            if ($pathinfo === '/live-tv/') {
                return array (  '_controller' => 'television_controller::index_action',  'bundle' => 'live',  '_route' => 'television_index',);
            }

        }

        if (0 === strpos($pathinfo, '/player')) {
            // player_embed
            if (0 === strpos($pathinfo, '/player/embed') && preg_match('#^/player/embed/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'player_embed')), array (  '_controller' => 'player_controller::embed_action',));
            }

            // player_initialize
            if (0 === strpos($pathinfo, '/player/initialize') && preg_match('#^/player/initialize/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'player_initialize')), array (  '_controller' => 'player_controller::initialize_action',  '_format' => 'json',));
            }

            // player_play
            if (0 === strpos($pathinfo, '/player/play') && preg_match('#^/player/play/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'player_play')), array (  '_controller' => 'player_controller::play_action',  '_format' => 'json',));
            }

            // player_broadcast
            if (0 === strpos($pathinfo, '/player/broadcast') && preg_match('#^/player/broadcast/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'player_broadcast')), array (  '_controller' => 'player_controller::broadcast_action',  '_format' => 'json',));
            }

            // player_share
            if (0 === strpos($pathinfo, '/player/share') && preg_match('#^/player/share/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'player_share')), array (  '_controller' => 'player_controller::share_action',  '_format' => 'json',));
            }

            // player_check
            if ($pathinfo === '/player/check/') {
                return array (  '_controller' => 'player_controller::check_action',  '_format' => 'json',  '_route' => 'player_check',);
            }

            // player_debug
            if ($pathinfo === '/player/debug/') {
                return array (  '_controller' => 'player_controller::debug_action',  '_format' => 'json',  '_route' => 'player_debug',);
            }

        }

        if (0 === strpos($pathinfo, '/tv-')) {
            if (0 === strpos($pathinfo, '/tv-channel')) {
                // chaine_tv_programmes_date
                if (preg_match('#^/tv\\-channel/(?P<channel_id>[^/]++)/(?P<channel_alias>[^/]++)/listings/(?P<date>[^/]++)/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'chaine_tv_programmes_date')), array (  '_controller' => 'chaine_tv_controller::programmes_tv_action',  'bundle' => 'program',));
                }

                // chaine_tv_programmes
                if (preg_match('#^/tv\\-channel/(?P<channel_id>[^/]++)/(?P<channel_alias>[^/]++)/listings/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'chaine_tv_programmes')), array (  '_controller' => 'chaine_tv_controller::programmes_tv_action',  'date' => NULL,  'bundle' => 'program',));
                }

                // chaine_tv
                if (preg_match('#^/tv\\-channel/(?P<channel_id>[^/]++)/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'chaine_tv')), array (  '_controller' => 'chaine_tv_controller::index_action',));
                }

            }

            if (0 === strpos($pathinfo, '/tv-guide')) {
                // programmes_timeslot
                if (preg_match('#^/tv\\-guide/(?P<date>[^/]++)/(?P<from_hour>[^/\\:]++)\\:00\\-(?P<to_hour>[^/\\:]++)\\:00/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'programmes_timeslot')), array (  '_controller' => 'programmes_tv_controller::timeslot_action',  'network' => NULL,));
                }

                if (0 === strpos($pathinfo, '/tv-guide/tonight')) {
                    // programmes_prime_date
                    if (preg_match('#^/tv\\-guide/tonight/(?P<date>[^/]++)/$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'programmes_prime_date')), array (  '_controller' => 'programmes_tv_controller::ce_soir_action',  'network' => NULL,));
                    }

                    // programmes_prime_tonight
                    if ($pathinfo === '/tv-guide/tonight/') {
                        return array (  '_controller' => 'programmes_tv_controller::ce_soir_action',  '_route' => 'programmes_prime_tonight',);
                    }

                }

                // programmes_en_direct
                if ($pathinfo === '/tv-guide/now/') {
                    return array (  '_controller' => 'programmes_tv_controller::en_direct_action',  '_route' => 'programmes_en_direct',);
                }

                // programmes
                if ($pathinfo === '/tv-guide/') {
                    return array (  '_controller' => 'programmes_tv_controller::index_action',  '_route' => 'programmes',);
                }

            }

            // programme
            if (0 === strpos($pathinfo, '/tv-shows') && preg_match('#^/tv\\-shows/(?P<program_id>[^/]++)/(?P<program_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'programme')), array (  '_controller' => 'programme_tv_controller::index_action',));
            }

        }

        // people_index
        if (0 === strpos($pathinfo, '/people') && preg_match('#^/people/(?P<cast_id>[^/]++)/(?P<cast_alias>[^/]++)/$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'people_index')), array (  '_controller' => 'people_controller::index_action',));
        }

        // url_index
        if ($pathinfo === '/url/') {
            return array (  '_controller' => 'url_controller::index_action',  '_route' => 'url_index',);
        }

        // recherche
        if ($pathinfo === '/search/') {
            return array (  '_controller' => 'recherche_controller::index_action',  '_route' => 'recherche',);
        }

        if (0 === strpos($pathinfo, '/trailer')) {
            // block_trailer
            if (0 === strpos($pathinfo, '/trailer/block-trailer') && preg_match('#^/trailer/block\\-trailer/(?P<program_id>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'block_trailer')), array (  '_controller' => 'trailer_controller::block_trailer_action',));
            }

            // trailer_embed
            if (0 === strpos($pathinfo, '/trailer/embed') && preg_match('#^/trailer/embed/(?P<program_id>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'trailer_embed')), array (  '_controller' => 'trailer_controller::embed_action',));
            }

            // trailer
            if (preg_match('#^/trailer/(?P<program_id>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'trailer')), array (  '_controller' => 'trailer_controller::index_action',));
            }

        }

        // help_support
        if ($pathinfo === '/help/support/') {
            return array (  '_controller' => 'aide_controller::support_action',  'bundle' => 'feedback',  '_route' => 'help_support',);
        }

        if (0 === strpos($pathinfo, '/debug')) {
            // debug_index
            if ($pathinfo === '/debug/') {
                return array (  '_controller' => 'debug_controller::index_action',  '_route' => 'debug_index',);
            }

            // debug_phpinfo
            if ($pathinfo === '/debug/phpinfo/') {
                return array (  '_controller' => 'debug_controller::phpinfo_action',  '_route' => 'debug_phpinfo',);
            }

        }

        // faq_adblock
        if ($pathinfo === '/faq/adblock/') {
            return array (  '_controller' => 'faq_controller::adblock_action',  '_route' => 'faq_adblock',);
        }

        if (0 === strpos($pathinfo, '/ad')) {
            // adblock_index
            if ($pathinfo === '/adblock/') {
                return array (  '_controller' => 'adblock_controller::index_action',  '_route' => 'adblock_index',);
            }

            if (0 === strpos($pathinfo, '/ad/t')) {
                // ad_television
                if ($pathinfo === '/ad/television/') {
                    return array (  '_controller' => 'ad_controller::television_action',  '_route' => 'ad_television',);
                }

                // ad_taboola
                if ($pathinfo === '/ad/taboola/') {
                    return array (  '_controller' => 'ad_controller::taboola_action',  '_route' => 'ad_taboola',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/ui/block-account-')) {
            // ui_block_account_header
            if ($pathinfo === '/ui/block-account-header/') {
                return array (  '_controller' => 'ui_controller::block_account_header_action',  '_route' => 'ui_block_account_header',);
            }

            // ui_block_account_facebook_connect
            if ($pathinfo === '/ui/block-account-facebook-connect/') {
                return array (  '_controller' => 'ui_controller::block_account_facebook_connect_action',  '_route' => 'ui_block_account_facebook_connect',);
            }

        }

        // groupes
        if (preg_match('#^/(?P<type_alias>(tv-series|movie|tv-show|group))/(?P<group_id>[^/]++)/(?P<group_alias>[^/]++)/$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'groupes')), array (  '_controller' => 'groupes_controller::groupe_action',));
        }

        // homepage
        if ($pathinfo === '/') {
            return array (  '_controller' => 'index_controller::index_action',  '_route' => 'homepage',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
