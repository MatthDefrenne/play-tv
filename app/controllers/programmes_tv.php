<?php

/**
 * Controller used to display tv programs pages.
 *
 * @author PLAYMEDIA
 */
class programmes_tv_controller extends ppl_app_controller
{
    protected $selected_network = null;
    protected $selected_date = null;
    protected $selected_timeslot = null;
    protected $now_timeslot = false;

    /**
     * On before action.
     *
     * @see ppl_app_controller::before_action()
     */
    public function before_action()
    {
        parent::before_action();

        $this->now_timeslot = $this->get_now_timeslot();

        $this->container['twig']->addGlobal('networks', $this->getSdk()['services.channel.network']->collection());
        $this->container['twig']->addGlobal('dates', $this->load('programs')->get_dates_range());
        $this->container['twig']->addGlobal('timeslots', $this->get_timeslots());
        $this->container['twig']->addGlobal('now_date', $this->globals->get('date.today'));
    }

    /**
     * Display program guide page.
     */
    public function index_action()
    {
        $this->set_page_title_trans('programmes');
        $this->set_page_description_trans('programmes');
        $this->set_page_keywords_trans('programmes');

        if ($this->isMobileLayout()) {
            $broadcasts_live = $this->broadcasts_live();

            return $this->render(array(
                'broadcasts_live' => $broadcasts_live,
            ), 'controllers/programmes-tv/timeslot_mobile.twig'
            );
        }

        $broadcasts_presets = $this->broadcasts_presets(null, null, 7);

        $toplive = $this->getSdk()['services.audience']->shareByHour($this->container['sdk_country_code'], 3);

        $featured_broadcasts = $this->container['broadcasts.featured'];
        $featured_broadcasts = array_slice($featured_broadcasts, 0, 5);

        $tmp = [];
        foreach ($featured_broadcasts as $row) {
            $start = $row['start'];
            $tmp[date('Y-m-d', strtotime($start))][] = $row;
        }
        $featured_broadcasts = $tmp;
        unset($tmp);

        return $this->render(array(
            'broadcasts_presets' => $broadcasts_presets,
            'toplive' => $toplive,
            'featured_broadcasts' => $featured_broadcasts,
        ));
    }

    /**
     * Display program schedules page.
     * $from_hour & $to_hour are setup with route regex (xxh-xxh format).
     *
     * @param string $date      The date (dd-mm-yyyy format)
     * @param string $from_hour The begin hour
     * @param string $to_hour   The ending hour
     * @param string $network   The channels network
     */
    public function timeslot_action($date, $from_hour, $to_hour, $network = null)
    {
        $_tools = $this->load('tools');

        // Date + Hours range validation
        if (!$this->is_valid_date($date) || !$this->check_timeslot($from_hour, $to_hour)) {
            return $this->createNotFoundResponse();
        }

        // Convert date to timestamp
        $date = strtotime($date);

        if (!is_null($network)) {
            $this->selected_network = $this->getSdk()['services.channel.network']->show($network);
            if ($this->selected_network === null) {
                return $this->createNotFoundResponse();
            }
        }

        $now = $this->globals->get('date.now');
        $this->selected_date = $date;
        $date_iso = $_tools->to_mysql($date, true);

        $from_date = ($from_hour == 0 ? (date('Y-m-d', ($date - 86400)).' 23') : "{$date_iso} ".($from_hour - 1)).':40:00';
        $to_date = ($from_hour < $to_hour ? $date_iso : date('Y-m-d', ($date + 86400)))." {$to_hour}:20:00";

        $this->selected_timeslot = array((int) $from_hour, (int) $to_hour);

        $from_time = (strtotime($from_date) + 1200);
        $to_time = (strtotime($to_date) - 1200);

        $channels = $this->container['core.mosaic.mosaic_manager']->getBroadcastMosaic($this->container['sdk_country_code'], $network)->toArray();
        $broadcasts_channels = $this->getSdk()['services.broadcast']->getTimeslotBroadcast(
            date('Y-m-d H:i:s', strtotime($from_date)),
            date('Y-m-d H:i:s', strtotime($to_date)),
            $channels
        );

        // previous + next timeslot
        $previous_timeslot = array(($from_hour - 3), (int) $from_hour);
        if ($previous_timeslot[0] < 0) {
            $previous_timeslot = array(23, 2);
        }
        $next_timeslot = array((int) $to_hour, ($to_hour + 3));
        if ($next_timeslot[0] === 23) {
            $next_timeslot = array(23, 2);
        } elseif ($next_timeslot[0] > 23) {
            $next_timeslot = array(2, 5);
        }

        if ($now >= $from_time && $now < $to_time) {
            $page_title = $this->trans('programmes_en_direct.title', [], 'seo');
            $page_description = $this->trans('programmes_en_direct.meta.description', [], 'seo');
            $this->set_page_keywords_trans('programmes_en_direct');
        } else {
            $trans_params = [
                '%date%' => strtolower($this->localized_date($date, 'full', 'none')),
                '%from%' => $from_hour,
                '%to%' => $to_hour,
            ];
            $page_title = $this->trans('programmes_timeslot.title', $trans_params, 'seo');
            $page_description = $this->trans('programmes_timeslot.meta.description', $trans_params, 'seo');
            $this->set_page_keywords_trans('programmes_en_direct');
        }

        if (!is_null($network)) {
            $page_title = $this->trans('common.append_network', ['%page_title%' => $page_title, '%network%' => $network], 'seo');
            $page_description = $this->trans('common.append_network', ['%page_title%' => $page_description, '%network%' => $network], 'seo');
        }

        $broadcasts_live = null;
        if ($this->isMobileLayout()) {
            $broadcasts_live = $this->broadcasts_live(null, $network);
        }

        $this->set_page_title($page_title);
        $this->set_page_description($page_description);

        return $this->render(array(
            'broadcasts_channels' => $broadcasts_channels,
            'broadcasts_live' => $broadcasts_live,
            'from_time' => $from_time,
            'to_time' => $to_time,
            'previous_timeslot' => $previous_timeslot,
            'next_timeslot' => $next_timeslot,
            'now_timeslot' => $this->now_timeslot,
            'selected_date' => $this->selected_date,
            'selected_timeslot' => $this->selected_timeslot,
            'selected_network' => $this->selected_network,
        ));
    }

    /**
     * Display live program schedules page.
     *
     * @see timeslot_action()
     *
     * @param string $network The channels network
     */
    public function en_direct_action($network = null)
    {
        $now_date = $this->globals->get('date.now');
        $now_timeslot = $this->get_now_timeslot();

        $date = ($now_timeslot[0] == 23 && date('H', $now_date) != 23 ? $now_date - 86400 : $now_date);
        $params = array(
            'date' => date($this->isI18n() ? 'Y-m-d' : 'd-m-Y', $date),
            'from_hour' => $now_timeslot[0],
            'to_hour' => $now_timeslot[1],
            'network' => $network,
        );

        return $this->forward('programmes_tv', 'timeslot', $params);
    }

    /**
     * Display tonight programs schedules page.
     *
     * @param string $date    The date (default is Today)
     * @param string $network The channels network
     *
     * @throws ControllerException
     */
    public function ce_soir_action($date = null, $network = null)
    {
        if (!is_null($network)) {
            $this->selected_network = $this->getSdk()['services.channel.network']->show($network);
            if ($this->selected_network === null) {
                return $this->createNotFoundResponse();
            }
        }

        if (!is_null($date)) {
            // Date validation
            if (!$this->is_valid_date($date)) {
                return $this->createNotFoundResponse();
            }

            // Convert date to timestamp
            $date = strtotime($date);

            $trans_params = [
                '%date%' => strtolower($this->localized_date($date, 'full', 'none')),
            ];
            $page_title = $this->trans('programmes_prime_date.title', $trans_params, 'seo');
            $page_description = $this->trans('programmes_prime_date.meta.description', $trans_params, 'seo');
        } else {
            $date = $this->globals->get('date.today');
            $page_title = $this->trans('programmes_prime_tonight.title', [], 'seo');
            $page_description = $this->trans('programmes_prime_tonight.meta.description', [], 'seo');
            $this->set_page_keywords_trans('programmes_prime_tonight');
        }

        if (!is_null($network)) {
            $page_title = $this->trans('common.append_network', ['%page_title%' => $page_title, '%network%' => $network], 'seo');
            $page_description = $this->trans('common.append_network', ['%page_title%' => $page_description, '%network%' => $network], 'seo');
        }

        $this->set_page_title($page_title);
        $this->set_page_description($page_description);

        $this->selected_date = $date;

        $presets = null;
        if ($this->isMobileLayout()) {
            $presets = 'primetime';
            if (isset($this->request->get['presets']) && in_array($this->request->get['presets'], ['primetime', 'latefringe'])) {
                $presets = $this->request->get['presets'];
                $this->robots(false);
            }
        }

        $broadcasts_presets = $this->broadcasts_presets($presets, $date, null, $network);

        return $this->render(array(
            'presets' => $presets,
            'broadcasts_presets' => $broadcasts_presets,
            'selected_date' => $this->selected_date,
            'selected_timeslot' => $this->selected_timeslot,
            'selected_network' => $this->selected_network,
        ));
    }

    /**
     * Display tonight programs schedules page for specific network channel.
     *
     * @see ce_soir_action()
     *
     * @param string $network The channels network
     */
    public function ce_soir_network_action($network)
    {
        return $this->forward('programmes_tv', 'ce_soir', array(
            'date' => null,
            'network' => $network,
        ));
    }

    /**
     * Display the featured programs page.
     */
    public function a_ne_pas_manquer_action()
    {
        $this->set_page_title($this->trans('programmes_prime_a_ne_pas_manquer.title', [], 'seo'));

        $super_featured_broadcasts = $this->getSdk()['services.broadcast']->getSuperFeaturedBroadcast($this->container['broadcasts.featured']);
        $super_featured_broadcasts = array_slice($super_featured_broadcasts, 0, 5);

        $tmp = [];
        foreach ($super_featured_broadcasts as $row) {
            $start = $row['start'];
            $tmp[date('Y-m-d', strtotime($start))][] = $row;
        }
        $super_featured_broadcasts = $tmp;
        unset($tmp);

        $featured_broadcasts = null;
        if (false === $this->isMobileLayout()) {
            $featured_broadcasts = $this->container['broadcasts.featured'];
            $featured_broadcasts = array_slice($featured_broadcasts, 0, 15);

            $tmp = [];
            foreach ($featured_broadcasts as $row) {
                $start = $row['start'];
                $tmp[date('Y-m-d', strtotime($start))][] = $row;
            }
            $featured_broadcasts = $tmp;
            unset($tmp);
        }

        return $this->render(array(
            'featured_broadcasts' => $featured_broadcasts,
            'super_featured_broadcasts' => $super_featured_broadcasts,
        ));
    }

    /**
     * Get program schedules timeslots.
     *
     * @return array The timeslots
     */
    public function get_timeslots()
    {
        return array(
            array(2, 5),
            array(5, 8),
            array(8, 11),
            array(11, 14),
            array(14, 17),
            array(17, 20),
            array(20, 23),
            array(23, 2),
        );
    }

    /**
     * Get the current timeslots.
     *
     * @return mixed the timeslots as array, otherwise NULL
     */
    public function get_now_timeslot()
    {
        $timeslots = $this->get_timeslots();
        $hour = date('H', $this->globals->get('date.now'));
        $c = count($timeslots);
        for ($i = 0; $i < $c; ++$i) {
            $from = &$timeslots[$i][0];
            $to = &$timeslots[$i][1];
            if (($hour >= $from && $hour < $to) || ($to < $from && ($hour >= $from || $hour < $to))) {
                return array($from, $to);
            }
        }

        return;
    }

    /**
     * Check a timeslot.
     *
     * @param mixed $from The begin hour
     * @param mixed $to   The ending hour
     */
    public function check_timeslot($from, $to)
    {
        $timeslots = $this->get_timeslots();
        $c = count($timeslots);
        for ($i = 0; $i < $c; ++$i) {
            $from_t = &$timeslots[$i][0];
            $to_t = &$timeslots[$i][1];
            if ((int) $from === $timeslots[$i][0] && (int) $to === $timeslots[$i][1]) {
                return true;
            }
        }

        return false;
    }

    protected function is_valid_date($date)
    {
        return $this->isI18n() ? $this->load('programs')->is_valid_i18n_date($date) : $this->load('programs')->is_valid_date($date);
    }
}
