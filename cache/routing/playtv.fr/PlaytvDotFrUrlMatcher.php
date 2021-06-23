<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * PlaytvDotFrUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class PlaytvDotFrUrlMatcher extends Symfony\Component\Routing\Matcher\UrlMatcher
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

        // old_partners_adsltv
        if (0 === strpos($pathinfo, '/adsltv') && preg_match('#^/adsltv/(?P<action>[^/]++)/$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'old_partners_adsltv')), array (  '_controller' => 'partners_controller::redirect_adsltv_action',  'action' => '',));
        }

        // old_partners_cotep
        if ($pathinfo === '/cotep/') {
            return array (  '_controller' => 'partners_controller::redirect_cotep_action',  '_route' => 'old_partners_cotep',);
        }

        // old_partners_novancia
        if ($pathinfo === '/novancia/') {
            return array (  '_controller' => 'partners_controller::redirect_novancia_action',  '_route' => 'old_partners_novancia',);
        }

        if (0 === strpos($pathinfo, '/pages')) {
            // csa_inscription
            if ($pathinfo === '/pages/csa-inscription/') {
                return array (  '_controller' => 'pages_controller::csa_inscription_action',  '_route' => 'csa_inscription',);
            }

            // pages_a_propos
            if ($pathinfo === '/pages/a-propos/') {
                return array (  '_controller' => 'pages_controller::a_propos_action',  '_route' => 'pages_a_propos',);
            }

            if (0 === strpos($pathinfo, '/pages/cg')) {
                // pages_cgu
                if ($pathinfo === '/pages/cgu/') {
                    return array (  '_controller' => 'pages_controller::cgu_action',  '_route' => 'pages_cgu',);
                }

                // pages_cgv
                if ($pathinfo === '/pages/cgv/') {
                    return array (  '_controller' => 'pages_controller::cgv_action',  '_route' => 'pages_cgv',);
                }

            }

            // pages_donnees_personnelles
            if ($pathinfo === '/pages/donnees-personnelles/') {
                return array (  '_controller' => 'pages_controller::donnees_personnelles_action',  '_route' => 'pages_donnees_personnelles',);
            }

            // pages_jobs
            if ($pathinfo === '/pages/jobs/') {
                return array (  '_controller' => 'pages_controller::jobs_action',  '_route' => 'pages_jobs',);
            }

            // pages_mentions_legales
            if ($pathinfo === '/pages/mentions-legales/') {
                return array (  '_controller' => 'pages_controller::mentions_legales_action',  '_route' => 'pages_mentions_legales',);
            }

            if (0 === strpos($pathinfo, '/pages/p')) {
                // pages_presse
                if ($pathinfo === '/pages/presse/') {
                    return array (  '_controller' => 'pages_controller::presse_action',  '_route' => 'pages_presse',);
                }

                // pages_publicite
                if ($pathinfo === '/pages/publicite/') {
                    return array (  '_controller' => 'pages_controller::publicite_action',  '_route' => 'pages_publicite',);
                }

            }

            // pages_questionnaire
            if ($pathinfo === '/pages/questionnaire/') {
                return array (  '_controller' => 'pages_controller::questionnaire_action',  '_route' => 'pages_questionnaire',);
            }

            // pages_browser_choice
            if ($pathinfo === '/pages/browser-choice/') {
                return array (  '_controller' => 'pages_controller::browser_choice_action',  '_route' => 'pages_browser_choice',);
            }

        }

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

            if (0 === strpos($pathinfo, '/television/m')) {
                // television_subscribe_filter
                if ($pathinfo === '/television/mes-chaines/') {
                    return array (  '_controller' => 'television_controller::my_channels_action',  'bundle' => 'live',  '_route' => 'television_subscribe_filter',);
                }

                // television_streamable_filter
                if ($pathinfo === '/television/mon-bouquet/') {
                    return array (  '_controller' => 'television_controller::streamable_filter_action',  'bundle' => 'live',  '_route' => 'television_streamable_filter',);
                }

            }

            // television_country_filter
            if (0 === strpos($pathinfo, '/television/pays') && preg_match('#^/television/pays/(?P<country_slug>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'television_country_filter')), array (  '_controller' => 'television_controller::country_action',  'bundle' => 'live',));
            }

            // television_zapping
            if (0 === strpos($pathinfo, '/television/zapping') && preg_match('#^/television/zapping/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'television_zapping')), array (  '_controller' => 'television_controller::zapping_action',));
            }

            // television_channel_single
            if (preg_match('#^/television/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'television_channel_single')), array (  '_controller' => 'television_controller::channel_action',  'channel_id' => NULL,  'bundle' => 'live',));
            }

            // television_index
            if ($pathinfo === '/television/') {
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

        if (0 === strpos($pathinfo, '/chaine-tv')) {
            // chaine_tv
            if (preg_match('#^/chaine\\-tv/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'chaine_tv')), array (  '_controller' => 'chaine_tv_controller::index_action',  'bundle' => 'program',));
            }

            // chaine_tv_en_direct
            if (0 === strpos($pathinfo, '/chaine-tv/en-direct') && preg_match('#^/chaine\\-tv/en\\-direct/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'chaine_tv_en_direct')), array (  '_controller' => 'chaine_tv_controller::en_direct_action',));
            }

            // chaine_tv_a_suivre
            if (0 === strpos($pathinfo, '/chaine-tv/a-suivre') && preg_match('#^/chaine\\-tv/a\\-suivre/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'chaine_tv_a_suivre')), array (  '_controller' => 'chaine_tv_controller::a_suivre_action',));
            }

        }

        if (0 === strpos($pathinfo, '/p')) {
            if (0 === strpos($pathinfo, '/programme')) {
                if (0 === strpos($pathinfo, '/programmes-tv')) {
                    if (0 === strpos($pathinfo, '/programmes-tv/ce-soir')) {
                        // programmes_prime_date_network
                        if (preg_match('#^/programmes\\-tv/ce\\-soir/(?P<date>[0-9]{2}-[0-9]{2}-[0-9]{4})/(?P<network>[^/]++)/$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'programmes_prime_date_network')), array (  '_controller' => 'programmes_tv_controller::ce_soir_action',));
                        }

                        // programmes_prime_date
                        if (preg_match('#^/programmes\\-tv/ce\\-soir/(?P<date>[0-9]{2}-[0-9]{2}-[0-9]{4})/$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'programmes_prime_date')), array (  '_controller' => 'programmes_tv_controller::ce_soir_action',  'network' => NULL,));
                        }

                        // programmes_prime_network
                        if (preg_match('#^/programmes\\-tv/ce\\-soir/(?P<network>[^/]++)/$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'programmes_prime_network')), array (  '_controller' => 'programmes_tv_controller::ce_soir_network_action',));
                        }

                        // programmes_prime_tonight
                        if ($pathinfo === '/programmes-tv/ce-soir/') {
                            return array (  '_controller' => 'programmes_tv_controller::ce_soir_action',  '_route' => 'programmes_prime_tonight',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/programmes-tv/en-direct')) {
                        // programmes_en_direct_with_params
                        if (preg_match('#^/programmes\\-tv/en\\-direct/(?P<network>[^/]++)/$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'programmes_en_direct_with_params')), array (  '_controller' => 'programmes_tv_controller::en_direct_action',));
                        }

                        // programmes_en_direct
                        if ($pathinfo === '/programmes-tv/en-direct/') {
                            return array (  '_controller' => 'programmes_tv_controller::en_direct_action',  'network' => NULL,  '_route' => 'programmes_en_direct',);
                        }

                    }

                    // programmes_timeslot_network
                    if (preg_match('#^/programmes\\-tv/(?P<date>[0-9]{2}-[0-9]{2}-[0-9]{4})/(?P<from_hour>[0-9]{1,})h\\-(?P<to_hour>[0-9]{1,})h/(?P<network>[^/]++)/$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'programmes_timeslot_network')), array (  '_controller' => 'programmes_tv_controller::timeslot_action',));
                    }

                    // programmes_timeslot
                    if (preg_match('#^/programmes\\-tv/(?P<date>[0-9]{2}-[0-9]{2}-[0-9]{4})/(?P<from_hour>[0-9]{1,})h\\-(?P<to_hour>[0-9]{1,})h/$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'programmes_timeslot')), array (  '_controller' => 'programmes_tv_controller::timeslot_action',  'network' => NULL,));
                    }

                    // programmes_prime_a_ne_pas_manquer
                    if ($pathinfo === '/programmes-tv/a-ne-pas-manquer/') {
                        return array (  '_controller' => 'programmes_tv_controller::a_ne_pas_manquer_action',  '_route' => 'programmes_prime_a_ne_pas_manquer',);
                    }

                    // chaine_tv_programmes_date
                    if (preg_match('#^/programmes\\-tv/(?P<channel_alias>[^/]++)/(?P<date>[^/]++)/$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'chaine_tv_programmes_date')), array (  '_controller' => 'chaine_tv_controller::programmes_tv_action',  'channel_id' => NULL,  'bundle' => 'program',));
                    }

                    // chaine_tv_programmes
                    if (preg_match('#^/programmes\\-tv/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'chaine_tv_programmes')), array (  '_controller' => 'chaine_tv_controller::programmes_tv_action',  'channel_id' => NULL,  'date' => NULL,  'bundle' => 'program',));
                    }

                    // programmes
                    if ($pathinfo === '/programmes-tv/') {
                        return array (  '_controller' => 'programmes_tv_controller::index_action',  '_route' => 'programmes',);
                    }

                }

                // programme
                if (0 === strpos($pathinfo, '/programme-tv') && preg_match('#^/programme\\-tv/(?P<program_id>[^/]++)/(?P<program_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'programme')), array (  '_controller' => 'programme_tv_controller::index_action',));
                }

            }

            // people_index
            if (0 === strpos($pathinfo, '/people') && preg_match('#^/people/(?P<cast_id>[^/]++)/(?P<cast_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'people_index')), array (  '_controller' => 'people_controller::index_action',));
            }

        }

        if (0 === strpos($pathinfo, '/replay')) {
            if (0 === strpos($pathinfo, '/replay-tv')) {
                // replay_legacy_uri_date_gendertypeid_channelalias_page
                if (preg_match('#^/replay\\-tv/(?P<date>[0-9]{2}-[0-9]{2}-[0-9]{4})/(?P<gendertypeid>\\d+)/(?P<channelalias>[^/]++)/(?P<page>\\d+)/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_legacy_uri_date_gendertypeid_channelalias_page')), array (  '_controller' => 'replay_tv_controller::legacy_uri_gendertypeid_action',));
                }

                // replay_legacy_uri_date_gendertypeid_channelalias
                if (preg_match('#^/replay\\-tv/(?P<date>[0-9]{2}-[0-9]{2}-[0-9]{4})/(?P<gendertypeid>\\d+)/(?P<channelalias>[^/]++)/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_legacy_uri_date_gendertypeid_channelalias')), array (  '_controller' => 'replay_tv_controller::legacy_uri_gendertypeid_action',));
                }

                // replay_legacy_uri_date_gendertypeid
                if (preg_match('#^/replay\\-tv/(?P<date>[0-9]{2}-[0-9]{2}-[0-9]{4})/(?P<gendertypeid>\\d+)/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_legacy_uri_date_gendertypeid')), array (  '_controller' => 'replay_tv_controller::legacy_uri_gendertypeid_action',));
                }

                // replay_legacy_uri_gendertypeid_channelalias_page
                if (preg_match('#^/replay\\-tv/(?P<gendertypeid>\\d+)/(?P<channelalias>[^/]++)/(?P<page>\\d+)/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_legacy_uri_gendertypeid_channelalias_page')), array (  '_controller' => 'replay_tv_controller::legacy_uri_gendertypeid_action',));
                }

                // replay_legacy_uri_gendertypeid_channelalias
                if (preg_match('#^/replay\\-tv/(?P<gendertypeid>\\d+)/(?P<channelalias>[^/]++)/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_legacy_uri_gendertypeid_channelalias')), array (  '_controller' => 'replay_tv_controller::legacy_uri_gendertypeid_action',));
                }

                // replay_legacy_uri_gendertypeid
                if (preg_match('#^/replay\\-tv/(?P<gendertypeid>\\d+)/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_legacy_uri_gendertypeid')), array (  '_controller' => 'replay_tv_controller::legacy_uri_gendertypeid_action',));
                }

                // replay_legacy_uri_date_gender_TOUS_page
                if (preg_match('#^/replay\\-tv/(?P<date>[0-9]{2}-[0-9]{2}-[0-9]{4})/(?P<gender_alias>tous|series-tv|actualite|sport|jeunesse|magazine|divertissement|documentaires|fictions|musique|autres)/tous/(?P<page>[^/]++)/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_legacy_uri_date_gender_TOUS_page')), array (  '_controller' => 'replay_tv_controller::legacy_uri_action',));
                }

                // replay_legacy_uri_date_gender_TOUS
                if (preg_match('#^/replay\\-tv/(?P<date>[0-9]{2}-[0-9]{2}-[0-9]{4})/(?P<gender_alias>tous|series-tv|actualite|sport|jeunesse|magazine|divertissement|documentaires|fictions|musique|autres)/tous/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_legacy_uri_date_gender_TOUS')), array (  '_controller' => 'replay_tv_controller::legacy_uri_action',  'page' => NULL,));
                }

                // replay_legacy_uri_1
                if (preg_match('#^/replay\\-tv/(?P<date>[0-9]{2}-[0-9]{2}-[0-9]{4})/(?P<gender_alias>tous|series-tv|actualite|sport|jeunesse|magazine|divertissement|documentaires|fictions|musique|autres)/(?P<channel_alias>[^/]++)/(?P<page>[^/]++)/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_legacy_uri_1')), array (  '_controller' => 'replay_tv_controller::legacy_uri_action',));
                }

                // replay_legacy_uri_2
                if (preg_match('#^/replay\\-tv/(?P<date>[0-9]{2}-[0-9]{2}-[0-9]{4})/(?P<gender_alias>tous|series-tv|actualite|sport|jeunesse|magazine|divertissement|documentaires|fictions|musique|autres)/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_legacy_uri_2')), array (  '_controller' => 'replay_tv_controller::legacy_uri_action',  'page' => NULL,));
                }

                // replay_legacy_uri_3
                if (preg_match('#^/replay\\-tv/(?P<date>[0-9]{2}-[0-9]{2}-[0-9]{4})/(?P<gender_alias>tous|series-tv|actualite|sport|jeunesse|magazine|divertissement|documentaires|fictions|musique|autres)/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_legacy_uri_3')), array (  '_controller' => 'replay_tv_controller::legacy_uri_action',  'channel_alias' => NULL,  'page' => NULL,));
                }

                // replay_legacy_uri_4
                if (preg_match('#^/replay\\-tv/(?P<date>[0-9]{2}-[0-9]{2}-[0-9]{4})/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_legacy_uri_4')), array (  '_controller' => 'replay_tv_controller::legacy_uri_action',  'gender_alias' => NULL,  'channel_alias' => NULL,  'page' => NULL,));
                }

                // replay_legacy_uri_gender_channel_page
                if (preg_match('#^/replay\\-tv/(?P<gender_alias>tous|series-tv|actualite|sport|jeunesse|magazine|divertissement|documentaires|fictions|musique|autres)/(?P<channel_alias>[^/]++)/(?P<page>[^/]++)/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_legacy_uri_gender_channel_page')), array (  '_controller' => 'replay_tv_controller::legacy_uri_action',  'date' => NULL,));
                }

                // replay_legacy_uri_gender_channel
                if (preg_match('#^/replay\\-tv/(?P<gender_alias>tous|series-tv|actualite|sport|jeunesse|magazine|divertissement|documentaires|fictions|musique|autres)/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_legacy_uri_gender_channel')), array (  '_controller' => 'replay_tv_controller::legacy_uri_action',  'date' => NULL,  'page' => NULL,));
                }

                // replay_legacy_uri_gender
                if (preg_match('#^/replay\\-tv/(?P<gender_alias>tous|series-tv|actualite|sport|jeunesse|magazine|divertissement|documentaires|fictions|musique|autres)/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_legacy_uri_gender')), array (  '_controller' => 'replay_tv_controller::legacy_uri_action',  'date' => NULL,  'channel_alias' => NULL,  'page' => NULL,));
                }

            }

            // replay_show
            if (0 === strpos($pathinfo, '/replay/show') && preg_match('#^/replay/show/(?P<video_id>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_show')), array (  '_controller' => 'replay_tv_controller::no_referrer_action',  'bundle' => 'replay',));
            }

            // replay_legacy_uri_replay_date
            if (preg_match('#^/replay/(?P<video_id>[^/]++)/(?P<title>[^/]++)/(?P<date>[0-9]{2}-[0-9]{2}-[0-9]{4})/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_legacy_uri_replay_date')), array (  '_controller' => 'replay_tv_controller::replay_action',  'bundle' => 'replay',));
            }

            // replay_replay
            if (preg_match('#^/replay/(?P<video_id>[^/]++)/(?P<title>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_replay')), array (  '_controller' => 'replay_tv_controller::replay_action',  'date' => NULL,  'bundle' => 'replay',));
            }

            // replay_replay_no_title
            if (preg_match('#^/replay/(?P<video_id>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_replay_no_title')), array (  '_controller' => 'replay_tv_controller::replay_action',  'title' => NULL,  'date' => NULL,  'bundle' => 'replay',));
            }

            if (0 === strpos($pathinfo, '/replay-tv')) {
                if (0 === strpos($pathinfo, '/replay-tv/videos')) {
                    // replay_channel_videos
                    if (preg_match('#^/replay\\-tv/videos/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'replay_channel_videos')), array (  '_controller' => 'replay_tv_controller::videos_action',  'channel_id' => NULL,  'bundle' => 'replay',));
                    }

                    // replay_videos
                    if ($pathinfo === '/replay-tv/videos/') {
                        return array (  '_controller' => 'replay_tv_controller::videos_action',  'bundle' => 'replay',  '_route' => 'replay_videos',);
                    }

                }

                // replay_tv_index
                if ($pathinfo === '/replay-tv/') {
                    return array (  '_controller' => 'replay_tv_controller::index_action',  'bundle' => 'replay',  '_route' => 'replay_tv_index',);
                }

            }

        }

        // url_index
        if ($pathinfo === '/url/') {
            return array (  '_controller' => 'url_controller::index_action',  '_route' => 'url_index',);
        }

        if (0 === strpos($pathinfo, '/live-tweets')) {
            if (0 === strpos($pathinfo, '/live-tweets/block-social-tv-posts')) {
                // live_tweets_block_social_tv_posts_channel
                if (preg_match('#^/live\\-tweets/block\\-social\\-tv\\-posts/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'live_tweets_block_social_tv_posts_channel')), array (  '_controller' => 'live_tweets_controller::block_social_tv_posts_channel_action',));
                }

                // live_tweets_block_social_tv_posts_index
                if ($pathinfo === '/live-tweets/block-social-tv-posts/') {
                    return array (  '_controller' => 'live_tweets_controller::block_social_tv_posts_action',  '_route' => 'live_tweets_block_social_tv_posts_index',);
                }

            }

            // live_tweets_channel
            if (preg_match('#^/live\\-tweets/(?P<channel_alias>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'live_tweets_channel')), array (  '_controller' => 'live_tweets_controller::index_action',  'bundle' => 'social',));
            }

            // live_tweets_index
            if ($pathinfo === '/live-tweets/') {
                return array (  '_controller' => 'live_tweets_controller::index_action',  'channel_alias' => NULL,  'bundle' => 'social',  '_route' => 'live_tweets_index',);
            }

        }

        // recherche
        if ($pathinfo === '/recherche/') {
            return array (  '_controller' => 'recherche_controller::index_action',  '_route' => 'recherche',);
        }

        if (0 === strpos($pathinfo, '/oauth/facebook')) {
            // oauth_facebook
            if ($pathinfo === '/oauth/facebook/') {
                return array (  '_controller' => 'oauth_controller::facebook_action',  '_route' => 'oauth_facebook',);
            }

            // oauth_facebook_deauthorize
            if ($pathinfo === '/oauth/facebook/deauthorize/') {
                return array (  '_controller' => 'oauth_controller::facebook_deauthorize_action',  '_route' => 'oauth_facebook_deauthorize',);
            }

            // oauth_facebook_connect
            if ($pathinfo === '/oauth/facebook/connect/') {
                return array (  '_controller' => 'oauth_controller::facebook_connect_action',  '_route' => 'oauth_facebook_connect',);
            }

        }

        if (0 === strpos($pathinfo, '/inscription')) {
            // bouncer_register
            if ($pathinfo === '/inscription/') {
                return array (  '_controller' => 'bouncer_controller::register_action',  'bundle' => 'bouncer',  '_route' => 'bouncer_register',);
            }

            // bouncer_register_verify
            if ($pathinfo === '/inscription/verification/') {
                return array (  '_controller' => 'bouncer_controller::register_verify_action',  '_route' => 'bouncer_register_verify',);
            }

        }

        // bouncer_request_confirmation_email
        if ($pathinfo === '/email-de-confirmation/demande/') {
            return array (  '_controller' => 'bouncer_controller::request_confirmation_email_action',  '_route' => 'bouncer_request_confirmation_email',);
        }

        // bouncer_login
        if ($pathinfo === '/connexion/') {
            return array (  '_controller' => 'bouncer_controller::login_action',  'bundle' => 'bouncer',  '_route' => 'bouncer_login',);
        }

        // bouncer_logout
        if ($pathinfo === '/deconnexion/') {
            return array (  '_controller' => 'bouncer_controller::logout_action',  '_route' => 'bouncer_logout',);
        }

        if (0 === strpos($pathinfo, '/mot-de-passe-oublie')) {
            // bouncer_forgot_password
            if ($pathinfo === '/mot-de-passe-oublie/') {
                return array (  '_controller' => 'bouncer_controller::forgot_password_action',  'bundle' => 'bouncer',  '_route' => 'bouncer_forgot_password',);
            }

            // bouncer_password_verify
            if ($pathinfo === '/mot-de-passe-oublie/verification/') {
                return array (  '_controller' => 'bouncer_controller::forgot_password_verify_action',  '_route' => 'bouncer_password_verify',);
            }

        }

        // bouncer_reinitialize_password
        if ($pathinfo === '/reinitialisation-mot-de-passe/') {
            return array (  '_controller' => 'bouncer_controller::reinitialize_password_action',  'bundle' => 'bouncer',  '_route' => 'bouncer_reinitialize_password',);
        }

        if (0 === strpos($pathinfo, '/mon-compte')) {
            // account_profile
            if ($pathinfo === '/mon-compte/profil/') {
                return array (  '_controller' => 'account_controller::profile_action',  'bundle' => 'account',  '_route' => 'account_profile',);
            }

            // account_subscriptions
            if ($pathinfo === '/mon-compte/abonnements/') {
                return array (  '_controller' => 'account_controller::subscriptions_action',  'bundle' => 'account',  '_route' => 'account_subscriptions',);
            }

            // account_notifications
            if ($pathinfo === '/mon-compte/notifications/') {
                return array (  '_controller' => 'account_controller::notifications_action',  'bundle' => 'account',  '_route' => 'account_notifications',);
            }

            // account_cancel_subscription
            if ($pathinfo === '/mon-compte/abonnements/resilier/') {
                return array (  '_controller' => 'account_controller::cancel_subscription_action',  'bundle' => 'account',  '_route' => 'account_cancel_subscription',);
            }

            if (0 === strpos($pathinfo, '/mon-compte/c')) {
                // account_change_password
                if ($pathinfo === '/mon-compte/changement-mot-de-passe/') {
                    return array (  '_controller' => 'account_controller::change_password_action',  'bundle' => 'account',  '_route' => 'account_change_password',);
                }

                // account_change_credit_card_infos
                if ($pathinfo === '/mon-compte/coordonnees-bancaires/') {
                    return array (  '_controller' => 'account_controller::change_credit_card_infos_action',  'bundle' => 'account',  '_route' => 'account_change_credit_card_infos',);
                }

            }

            // account_deactivate
            if ($pathinfo === '/mon-compte/suppression/') {
                return array (  '_controller' => 'account_controller::delete_action',  '_route' => 'account_deactivate',);
            }

        }

        // sales_noop
        if ($pathinfo === '/noop-190240101/') {
            return array (  '_controller' => 'sales_controller::noop_action',  'bundle' => 'sales',  '_route' => 'sales_noop',);
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

        // newsletter_unsubscribe
        if ($pathinfo === '/newsletter/desabonnement/') {
            return array (  '_controller' => 'newsletter_controller::unsubscribe_action',  'bundle' => 'account',  '_route' => 'newsletter_unsubscribe',);
        }

        if (0 === strpos($pathinfo, '/faq')) {
            // faq_adblock
            if ($pathinfo === '/faq/adblock/') {
                return array (  '_controller' => 'faq_controller::adblock_action',  '_route' => 'faq_adblock',);
            }

            // faq_index
            if ($pathinfo === '/faq/') {
                return array (  '_controller' => 'faq_controller::index_action',  '_route' => 'faq_index',);
            }

            // faq_flash_player
            if ($pathinfo === '/faq/flash-player/') {
                return array (  '_controller' => 'faq_controller::flash_player_action',  '_route' => 'faq_flash_player',);
            }

            // faq_chaine_indisponible
            if ($pathinfo === '/faq/chaine-indisponible/') {
                return array (  '_controller' => 'faq_controller::chaine_indisponible_action',  '_route' => 'faq_chaine_indisponible',);
            }

            // faq_hors_bouquet
            if ($pathinfo === '/faq/hors-bouquet/') {
                return array (  '_controller' => 'faq_controller::hors_bouquet_action',  '_route' => 'faq_hors_bouquet',);
            }

            // faq_saccades_video
            if ($pathinfo === '/faq/saccades-video/') {
                return array (  '_controller' => 'faq_controller::saccades_video_action',  '_route' => 'faq_saccades_video',);
            }

            // faq_probleme_son
            if ($pathinfo === '/faq/probleme-son/') {
                return array (  '_controller' => 'faq_controller::probleme_son_action',  '_route' => 'faq_probleme_son',);
            }

            // faq_qualite_video
            if ($pathinfo === '/faq/qualite-video/') {
                return array (  '_controller' => 'faq_controller::qualite_video_action',  '_route' => 'faq_qualite_video',);
            }

            if (0 === strpos($pathinfo, '/faq/r')) {
                // faq_rapport_erreur
                if ($pathinfo === '/faq/rapport-erreur/') {
                    return array (  '_controller' => 'faq_controller::rapport_erreur_action',  '_route' => 'faq_rapport_erreur',);
                }

                // faq_revoir_enregistrer
                if ($pathinfo === '/faq/revoir-enregistrer/') {
                    return array (  '_controller' => 'faq_controller::revoir_enregistrer_action',  '_route' => 'faq_revoir_enregistrer',);
                }

            }

            // faq_smartphones
            if ($pathinfo === '/faq/smartphones/') {
                return array (  '_controller' => 'faq_controller::smartphones_action',  '_route' => 'faq_smartphones',);
            }

            // faq_tablettes
            if ($pathinfo === '/faq/tablettes/') {
                return array (  '_controller' => 'faq_controller::tablettes_action',  '_route' => 'faq_tablettes',);
            }

            // faq_vo_sous_titres
            if ($pathinfo === '/faq/vo-sous-titres/') {
                return array (  '_controller' => 'faq_controller::vo_sous_titres_action',  '_route' => 'faq_vo_sous_titres',);
            }

            // faq_france_3_region
            if ($pathinfo === '/faq/france-3-region/') {
                return array (  '_controller' => 'faq_controller::france_3_region_action',  '_route' => 'faq_france_3_region',);
            }

            // faq_erreur_programme
            if ($pathinfo === '/faq/erreur-programme/') {
                return array (  '_controller' => 'faq_controller::erreur_programme_action',  '_route' => 'faq_erreur_programme',);
            }

            // faq_remarques_programmation
            if ($pathinfo === '/faq/remarques-programmation/') {
                return array (  '_controller' => 'faq_controller::remarques_programmation_action',  '_route' => 'faq_remarques_programmation',);
            }

            // faq_compte_utilisateur
            if ($pathinfo === '/faq/compte-utilisateur/') {
                return array (  '_controller' => 'faq_controller::compte_utilisateur_action',  '_route' => 'faq_compte_utilisateur',);
            }

            // faq_supprimer_compte_utilisateur
            if ($pathinfo === '/faq/supprimer-compte-utilisateur/') {
                return array (  '_controller' => 'faq_controller::supprimer_compte_utilisateur_action',  '_route' => 'faq_supprimer_compte_utilisateur',);
            }

            // faq_resilier_abonnement
            if ($pathinfo === '/faq/resilier-abonnement/') {
                return array (  '_controller' => 'faq_controller::resilier_abonnement_action',  '_route' => 'faq_resilier_abonnement',);
            }

        }

        if (0 === strpos($pathinfo, '/aide')) {
            // help_support
            if ($pathinfo === '/aide/support/') {
                return array (  '_controller' => 'aide_controller::support_action',  'bundle' => 'feedback',  '_route' => 'help_support',);
            }

            // aide_config
            if ($pathinfo === '/aide/config/') {
                return array (  '_controller' => 'aide_controller::config_action',  'bundle' => 'feedback',  '_route' => 'aide_config',);
            }

            // aide_index
            if ($pathinfo === '/aide/') {
                return array (  '_controller' => 'aide_controller::index_action',  '_route' => 'aide_index',);
            }

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

        // toplive_index
        if ($pathinfo === '/toplive/') {
            return array (  '_controller' => 'toplive_controller::index_action',  '_route' => 'toplive_index',);
        }

        // groupes
        if (preg_match('#^/(?P<type_alias>(serie-tv|films|emission|groupe))/(?P<group_id>[^/]++)/(?P<group_alias>[^/]++)/$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'groupes')), array (  '_controller' => 'groupes_controller::groupe_action',));
        }

        // homepage
        if ($pathinfo === '/') {
            return array (  '_controller' => 'index_controller::index_action',  '_route' => 'homepage',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
