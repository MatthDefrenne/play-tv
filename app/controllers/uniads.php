<?php

/**
 * Uniads controller.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
class uniads_controller extends ppl_app_controller
{
    protected $uniads;

    public function before_action()
    {
        parent::before_action();

        $this->robots(false);
        $this->uniads = $this->load('uniads', $this->container['caching.uniads']);
    }
    /**
     * Default action (return 403 Forbidden).
     */
    public function index_action()
    {
        return $this->jsonResponse(null, 403);
    }

    /**
     * Uniads /config/ entry point.
     */
    public function config_action()
    {
        //
        // Mandatory expected GET parameter is appzone
        // Additionnal account and channelid parameters
        //
        $appzone = (isset($_GET['appzone'])) ? $_GET['appzone'] : '';
        $channel = (isset($_GET['channelid'])) ? $this->container['sdk']['services.channel']->show($_GET['channelid']) : null;

        // Apply config algorithm
        $config = $this->uniads->config(
            $appzone,
            $this->container['sdk'],
            $this->container['account'],
            $channel,
            $this->container['country_code']
        );

        // Invalid appzone
        if (false === $config) {
            return $this->jsonResponse(null, 403);
        }

        return $this->jsonResponse($config);
    }

    /**
     * Uniads /request/ entry point.
     */
    public function request_action()
    {
        // Mandatory expected GET parameters are channelid, oxpublisherid & zoneid
        $channel_id = (isset($_GET['channelid'])) ? $_GET['channelid'] : '';
        $ox_publisher_id = (isset($_GET['oxpublisherid'])) ? $_GET['oxpublisherid'] : '';
        $zone_id = (isset($_GET['zoneid'])) ? $_GET['zoneid'] : '';

        if (($channel_id == '') || ($ox_publisher_id == '') || ($zone_id == '')) {
            return $this->jsonResponse(null, 403);
        }

        $request = $this->uniads->request($channel_id, $ox_publisher_id, $zone_id);
        if (false === $request) {
            return $this->jsonResponse(null, 403);
        }

        return $this->jsonResponse($request);
    }

    /**
     * Uniads /impression/ entry point.
     */
    public function impression_action()
    {
        // Mandatory expected GET parameter is cappingid
        $capping_id = (isset($_GET['cappingid'])) ? $_GET['cappingid'] : '';
        if ($capping_id == '') {
            return $this->jsonResponse(null, 403);
        }

        $impression = $this->uniads->impression($capping_id);
        if (false === $impression) {
            return $this->jsonResponse(null, 403);
        }

        return $this->jsonResponse($impression);
    }

    /**
     * Uniads /debug/ entry point.
     */
    public function debug_action()
    {
        // is_playmedia() is defined in "app/src/functions.php"
        if (is_playmedia()) {
            $debug = new stdClass();
            $debug->isEnabled = $this->uniads->setDebugCookie();

            return $this->jsonResponse($debug);
        }

        return $this->jsonResponse(null, 403);
    }
}
