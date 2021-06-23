<?php

use Playmedia\Component\Channel;

/**
 * Wrapper for ads for desktop device.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
class uniads_component extends ppl_component
{
    /**
     * Uniads player version.
     *
     * @var string
     */
    const PLAYER_VERSION = '175';

    /**
     * Flash version.
     *
     * @var string
     */
    const FLASH_VERSION = '10.0.0';

    /**
     * Banner type 'none'.
     *
     * @var int
     */
    const TYPE_NONE = 0;

    /**
     * Banner type 'PlayTV'.
     *
     * @var int
     */
    const TYPE_PLAYTV = 1;

    /**
     * Banner type 'AdsWizz'.
     *
     * @var int
     */
    const TYPE_ADSWIZZ = 2;

    /**
     * Banner type 'Videoplaza'.
     *
     * @var int
     */
    const TYPE_VIDEOPLAZA = 3;

    /**
     * Banner type 'VAST'.
     *
     * @var int
     */
    const TYPE_VAST = 4;

    /**
     * Banner type 'Google IMA'
     * (previously Adsense).
     *
     * @var int
     */
    const TYPE_GOOGLE_IMA = 5;

    /**
     * Banner type 'HTML5 Liverail'
     * (Used with Ad Videum).
     *
     * @var int
     */
    const TYPE_HTML5_LIVERAIL = 6;

    /**
     * Banner type 'HTML5 Mustang'
     * (Used with Sticky Ads).
     *
     * @var int
     */
    const TYPE_HTML5_MUSTANG = 7;

    /**
     * Debug cookie name
     * (enable debug console).
     *
     * @var string
     */
    const DEBUG_COOKIE_NAME = '__ua_debug';

    /**
     * Uniads logger object.
     *
     * @var ppl_log_logger
     */
    private $upr_log;

    /**
     * The configuration site zones dictionary.
     * RESPECT convention : {site}.{preroll|inflow|trailer}.
     *
     * @var array
     */
    private $appzones = array(
        'partners.adsltv' => false,
        'desktop.wibox' => false,
        'desktop.darty' => false,
        'partners.cotep' => false,
        'partners.novancia' => false,
        'desktop.preroll_teaser' => false,
        'desktop.preroll' => 1,
        'desktop.replay' => 2,
        'desktop.inflow' => 4,
        'desktop.trailer' => 5,
        'mobile.preroll' => 6,
        'ledirect.preroll' => 8,
        'ledirect.inflow' => 9,
        'centraltv.preroll' => 10,
        'centraltv.inflow' => 12,
        'fomnytv.preroll' => 13,
        'fomnytv.inflow' => 14,
        'gratuitetv.preroll' => 15,
        'gratuitetv.inflow' => 16,
        'play-tv-uk.preroll' => 17,
        'play-tv-uk.inflow' => 18,
        'oklivetv.preroll' => 19,
        'oklivetv.inflow' => 20,
    );

    /**
     * The memcache object.
     *
     * @var ppl_cache_memcache
     */
    protected $memcache_uniads;

    /**
     * Debug flag.
     *
     * @var bool
     */
    protected $debug = false;

    /**
     * Banner display time in seconds.
     *
     * @var int
     */
    protected $banner_duration = 60;

    /**
     * Constructor.
     */
    public function construct($mc)
    {
        $this->upr_log = $this->get_logger('uniads');
        $this->memcache_uniads = $mc;
        $this->debug = $this->isDebug();
    }

    /**
     * Get Uniads javascript configuration in Json format.
     *
     * @param string $appzone
     *
     * @return mixed the configuration object, otherwise false on error
     */
    public function config($appzone, $sdk, $account = null, $channel = null, $country = null)
    {
        // default to desktop.preroll if unknown
        // prevents from by-passing advertisements on sites like :
        // - http://www.mondialtv.fr/television-marocaine/2m-maroc
        // - http://musiquechaabi.free.fr/medi-1-tv-.html
        if (!isset($this->appzones[$appzone])) {
            $appzone = 'desktop.preroll';
        }

        $conf = new stdClass();
        if (false == $this->appzones[$appzone]) {
            return $conf;
        } // adverts disabled (empty object)

        // specific whitelist list
        if (!is_null($channel)) {
            $whitelist = [
                'hotvideotv',
                'lcpan',
                'public-senat-24-24',
            ];

            if (in_array($channel['alias'], $whitelist)) {
                return $conf;
            }
        }

        // specific preroll zones check
        if (false !== strpos($appzone, '.preroll') && isset($this->appzones[$appzone])
        ) {
            if (!is_null($channel)) {

                // streamable internal only
                $channel = Channel::getStreamingKeys($channel, $country, $account);
                if (false === $channel['streamable']) {
                    return $conf;
                }

                // others channels
                $channel_products_aliases = array();

                // Extract alias
                foreach ($channel['products'] as $item) {
                    if ($item['alias'] != 'pack-decouverte') {
                        $channel_products_aliases[] = $item['alias'];
                    }
                }

                // Looking for a match within Account Subscriptions
                if (count($channel_products_aliases) > 0 && !is_null($account)) {
                    foreach ($channel_products_aliases as $product_alias) {
                        if ($account->isSubscribedTo($product_alias)) {
                            return $conf;
                        }
                    }
                }
            }
        } else {
            // other zones
            if (!is_null($account) && $account->isPremium()) {
                return $conf;
            }
        }

        // potential playlist
        $conf->debug = $this->debug;
        $conf->apiUrl = sprintf('%s://%s/uniads/',
            $this->request->protocol,
            $this->request->host
        );
        $conf->bannerDuration = $this->banner_duration;
        $conf->swfUrl = sprintf('%s://%s/assets/swf/uniads%s.swf',
            $this->request->protocol,
            $this->request->host,
            self::PLAYER_VERSION
        );
        $conf->flashVersion = self::FLASH_VERSION;
        $conf->publisherId = 2; // OpenX PLAYTV publisher ID
        $conf->zoneId = $this->appzones[$appzone];

        return $conf;
    }

    /**
     * Request adverts.
     *
     * @param string $channel_id
     * @param string $ox_publisher_id
     * @param string $zone_id
     *
     * @return mixed adverts as Array, otherwise false
     */
    public function request($channel_id, $ox_publisher_id, $zone_id)
    {
        if (!is_numeric($channel_id) || !is_numeric($channel_id) || !is_numeric($channel_id)) {
            $this->upr_log->error('request(): invalid parameters');

            return false;
        }

        return $this->get_channel_prerolls((int) $channel_id, (int) $ox_publisher_id, (int) $zone_id);
    }

    /**
     * Perform third party impression (used for display capping).
     *
     * @param string $capping_id
     *
     * @return mixed Current capping counter value as object, otherwise false on error
     */
    public function impression($capping_id)
    {
        if ($capping_id == '') {
            $this->upr_log->error('impression(): invalid parameters');

            return false;
        }

        return $this->ad_impression($capping_id);
    }

    /**
     * Activate debug cookie.
     *
     * @return bool true on success, otherwise false on error
     */
    public function setDebugCookie()
    {
        return $this->cookie->set(self::DEBUG_COOKIE_NAME, 1);
    }

    /**
     * Indicate if debug is enabled.
     *
     * @return bool true if enabled, otherwise false
     */
    private function isDebug()
    {
        // TODO: also check ip addr ?
        return 1 == $this->cookie->get(self::DEBUG_COOKIE_NAME);
    }

    /**
     * Return flashplayer adverts setup.
     *
     * @param int $channel_id
     * @param int $ox_publisher_id
     * @param int $zone_id
     *
     * @return mixed adverts setup as Array, otherwise false on error
     */
    private function get_channel_prerolls($channel_id, $ox_publisher_id, $zone_id)
    {
        // increment requests counter
        $this->increment_requests($channel_id, $ox_publisher_id, $zone_id);

        // Get active campains
        $acs = $this->get_active_campaigns($ox_publisher_id, $zone_id);
        if ($acs === null) {
            $this->upr_log->error('NO ACTIVE CAMPAIGN FOUND');

            return false;
        }
        $active_campaigns = $acs->active_campaigns;

        // Get prerolls
        $ads = null;
        if (isset($active_campaigns[$channel_id])) {
            $ads = $this->get_channel_campaign($ox_publisher_id, $zone_id, $channel_id);
        } elseif (isset($active_campaigns[0])) {
            $ads = $this->get_channel_campaign($ox_publisher_id, $zone_id, 0);
        }

        // Campains without ads are allowed (to display alternate ad)
        if (($ads === null) || !is_array($ads)) {
            $ads = array();
        }

        // Check prerolls
        foreach ($ads as $k => $ad) {
            // Check start date
            if (!$this->ad_is_started($ad)) {
                unset($ads[$k]);
                continue;
            }

            // Check expiration
            if ($this->ad_is_expired($ad)) {
                unset($ads[$k]);
                continue;
            }

            // Check capping
            if (isset($ad->capping) && ($ad->capping > 0)) {
                if ($this->ad_is_capped($ad)) {
                    unset($ads[$k]);
                    continue;
                }
                $ad->capping = 1;
            }

            // Remove useless properties
            unset($ads[$k]->expire);

            // Disable companion for Cash TV channel (61)
            if (isset($ad->companion) && ($channel_id == 61)) {
                $ad->companion = null;
            }

            // Check for PLAYTV type
            if ($ad->type === self::TYPE_PLAYTV) {
                // Build VAST request uri
                $ad->tag = $this->openxVASTrequest($ad->ox_zoneid, $ad->upr);
            } elseif ($ad->type === self::TYPE_VAST) {
                // Create cache buster parameter with at least 8 digits
                $cb = rand(10000000, 99999999);

                // Check for [country] parameter
                if (strpos($ad->tag, '[country]') === true) {
                    $ad->tag = preg_replace('/\[country\]/', $this->globals->get('user.country'), $ad->tag, 1);
                }
                // Apply cachebuster only if not liverail VAST tag
                if (strpos($ad->tag, 'ad4.liverail.com') === false) {
                    // Check for [random] parameter (cache buster)
                    if (strpos($ad->tag, '[random]') === false) {
                        // [random] not found we add custom cache buster
                        $ad->tag .= (strpos($ad->tag, '?') === false) ? "?rnd={$cb}" : "&rnd={$cb}";
                    } else {
                        // [random] found we replace it with cachebuster
                        $ad->tag = preg_replace('/\[random\]/', $cb, $ad->tag, 1);
                    }
                }
            } elseif ($ad->type === self::TYPE_GOOGLE_IMA) {
                $ad->contentid = "channel-id-{$channel_id}";
            }
        }

        // Add configuration at beginning
        array_unshift($ads, $this->get_config($acs->ox_zoneid));

        // Return prerolls as array of objects
        return $ads;
    }

    /**
     * Get active campaigns.
     *
     * @param int $ox_publisher_id
     * @param int $zone_id
     */
    private function get_active_campaigns($ox_publisher_id, $zone_id)
    {
        $key = $this->active_campaigns_key($ox_publisher_id, $zone_id);
        $acs = $this->memcache_uniads->get($key);

        if (false === $acs) {
            // Fallback to database
            $this->upr_log->warning('get_active_campaigns(): fallback to database');

            $rows = $this->db->execute($this->db->sql->select()
                ->from('upr_production_acs')
                ->where('ox_publisherid', $ox_publisher_id)
                ->andwhere('zone_id', $zone_id));
            if (isset($rows[0]['acs'])) {
                $acs = unserialize($rows[0]['acs']);
                if (is_object($acs)) {
                    // Auto store in memcached
                    $this->memcache_uniads->set($key, $acs);
                } else {
                    $this->upr_log->error("get_active_campaigns(): unserialize() failed for ox_publisherid: {$ox_publisher_id}, zone_id: {$zone_id}");
                    $acs = null;
                }
            } else {
                $this->upr_log->error("get_active_campaigns(): database request failed for ox_publisherid: {$ox_publisher_id}, zone_id: {$zone_id}");
                $acs = null;
            }
        } else {
            $this->upr_log->debug('get_active_campaigns(): memcached get() successfull');
        }

        return $acs;
    }

    /**
     * Get channel campaign.
     *
     * @param int $ox_publisher_id
     * @param int $zone_id
     * @param int $channel_id
     */
    private function get_channel_campaign($ox_publisher_id, $zone_id, $channel_id)
    {
        $key = $this->channel_campaigns_key($ox_publisher_id, $zone_id, $channel_id);
        $ads = $this->memcache_uniads->get($key);

        if (false === $ads) {
            // Fallback to database
            $this->upr_log->warning("get_channel_campaign(): fallback to database querying for ox_publisherid: {$ox_publisher_id}, zone_id: {$zone_id}, channel_id : {$channel_id}");

            $rows = $this->db->execute($this->db->sql->select()
                ->from('upr_production_ads')
                ->where('ox_publisherid', $ox_publisher_id)
                ->andwhere('zone_id', $zone_id)
                ->andwhere('channel_id', $channel_id));

            if (isset($rows[0]['ads'])) {
                $ads = unserialize($rows[0]['ads']);
                if (is_array($ads)) {
                    // Auto store in memcached
                    $this->memcache_uniads->set($key, $ads);
                } else {
                    $this->upr_log->error("get_channel_campaign(): unserialize() failed for ox_publisherid: {$ox_publisher_id}, zone_id: {$zone_id}, channel_id : {$channel_id}");
                    $ads = null;
                }
            } else {
                $this->upr_log->error("get_channel_campaign(): database request failed for ox_publisherid: {$ox_publisher_id}, zone_id: {$zone_id}, channel_id : {$channel_id}");
                $ads = null;
            }
        } else {
            $this->upr_log->debug("get_channel_campaign(): succesfully queried Memcache for ox_publisherid: {$ox_publisher_id}, zone_id: {$zone_id}, channel_id : {$channel_id}");
        }

        return $ads;
    }

    /**
     * Get memcache "active campaigns" key for website zone.
     *
     * @param int $ox_publisherid
     * @param int $zone_id
     *
     * @return string memcache key
     */
    public function active_campaigns_key($ox_publisherid, $zone_id)
    {
        return "UNIADS_AC_{$ox_publisherid}_{$zone_id}";
    }

    /**
     * Get memcache "channel campaigns" key for website zone.
     *
     * @param int $ox_publisherid
     * @param int $zone_id
     * @param int $channel_id
     *
     * @return string memcache key
     */
    public function channel_campaigns_key($ox_publisherid, $zone_id, $channel_id)
    {
        return "UNIADS_{$ox_publisherid}_{$zone_id}_{$channel_id}";
    }

    /**
     * Return preroll impression memcache key.
     *
     * @param int $capping_id
     *
     * @return string memcache key
     */
    private function impression_key($capping_id)
    {
        return "UPR_{$capping_id}-".date('Y-m-d');
    }

    /**
     * Get memcache channel "requests counter" key for website zone.
     *
     * @param int $zone_id
     * @param int $channel_id
     */
    public function requests_key($zone_id, $channel_id)
    {
        return "UNIADS_{$zone_id}_{$channel_id}-".date('Y-m-d');
    }

    /**
     * Check if preroll is expired.
     *
     * @param object $ad
     *
     * @return bool true if expired, otherwise false
     */
    private function ad_is_expired($ad)
    {
        if (isset($ad->expire)) {
            return time() > $ad->expire;
        }

        return false;
    }

    /**
     * Check if preroll campaign is started.
     *
     * @param object $ad
     *
     * @return bool true if started, otherwise false
     */
    private function ad_is_started($ad)
    {
        if (isset($ad->start)) {
            return time() > $ad->start;
        }

        return true;
    }

    /**
     * Check if preroll is capped.
     *
     * @param object $ad
     *
     * @return bool true if capped, otherwise false
     */
    private function ad_is_capped($ad)
    {
        $key = $this->impression_key($ad->capping_id);
        $count = $this->memcache_uniads->get($key);

        if (false === $count) {
            $count = 0;
        }

        return $count >= $ad->capping;
    }

    /**
     * Increment preroll capping counter.
     *
     * @param string $capping_id
     *
     * @return mixed new preroll capping counter value as object, otherwise false on failure
     */
    private function ad_impression($capping_id)
    {
        // NOTE : memcache add() & increment() are used to avoid race conditions
        $key = $this->impression_key($capping_id);
        $this->memcache_uniads->add($key, 0, 90000); // TTL is 25 hours
        $c = $this->memcache_uniads->increment($key);

        if (false === $c) {
            return false;
        }

        $r = new stdClass();
        $r->cappingId = $capping_id;
        $r->count = $c;

        return $r;
    }

    /**
     * Get OpenX base uri.
     *
     * @param string $default_domain
     *
     * @return string OpenX base uri
     */
    private function openx_domain($default_domain = 'playtv.fr')
    {
        $adserver_host = $this->load('app')->get_hosts('ad_full_secure');

        return "{$adserver_host}/delivery/";
    }

    /**
     * Get OpenX request uri.
     *
     * @param string $front_controller
     *
     * @return string OpenX request uri
     */
    private function openx_request_uri($front_controller = 'fc.php')
    {
        return $this->openx_domain().$front_controller;
    }

    /**
     * Get OpenX request uri.
     *
     * @param string $front_controller
     *
     * @return string OpenX request uri
     */
    private function openx_impression_uri($front_controller = 'lg.php')
    {
        return $this->openx_domain().$front_controller;
    }

    /**
     * Get OpenX click uri.
     *
     * @param string $front_controller
     *
     * @return string OpenX click uri
     */
    private function openx_click_uri($front_controller = 'ck.php')
    {
        return $this->openx_domain().$front_controller;
    }

    /**
     * Get OpenX display uri.
     *
     * @param string $ox_zoneid
     * @param string $front_controller
     *
     * @return string OpenX display uri
     */
    private function openx_display_uri($ox_zoneid = null, $front_controller = 'afr.php')
    {
        if ($ox_zoneid === null) {
            return;
        }

        return $this->openx_domain()."{$front_controller}?zoneid={$ox_zoneid}";
    }

    /**
     * Get OpenX custom companion uri.
     *
     * @param string $front_controller
     *
     * @return string OpenX display uri
     */
    private function openx_companion_uri($front_controller = 'afr.php')
    {
        return $this->openx_domain()."{$front_controller}?zoneid=";
    }

    /**
     * Get OpenX VAST request uri.
     *
     * @param string $ox_zoneid
     * @param string $upr
     *
     * @return string OpenX VAST request uri
     */
    private function openxVASTrequest($ox_zoneid, $upr)
    {
        $cb = rand(10000000, 99999999); // 8 digits
        $country = $this->globals->get('user.country');

        return $this->openx_request_uri()."?script=bannerTypeHtml:vastInlineBannerTypeHtml:vastInlineHtml&zones={$ox_zoneid}&format=vast&charset=UTF-8&upr={$upr}&country={$country}&rnd={$cb}";
    }

    /**
     * Get OpenX tracking configuration.
     *
     * @param mixed $ox_zoneid
     * @param bool  $has_companion
     *
     * @return object configuration
     */
    private function get_config($ox_zoneid)
    {
        $conf = new stdClass();
        $conf->request = $this->openx_request_uri();
        $conf->impression = $this->openx_impression_uri();
        $conf->click = $this->openx_click_uri();
        $conf->display = $this->openx_display_uri($ox_zoneid);
        $conf->companion = $this->openx_companion_uri();

        return $conf;
    }

    /**
     * Increment channel REQUESTS zone daily counter.
     *
     * @param int $channel_id
     * @param int $ox_publisher_id
     * @param int $zone_id
     */
    private function increment_requests($channel_id, $ox_publisher_id, $zone_id)
    {
        // $this->upr_log->debug("increment_requests( ${channel_id}, ${ox_publisher_id}, ${zone_id} )");

        // NOTE : memcache add() & increment() are used to avoid race conditions
        $key = $this->requests_key($zone_id, $channel_id);
        $this->memcache_uniads->add($key, 0, 90000); // TTL is 25 hours
        $this->memcache_uniads->increment($key);

        return true;
    }
}
