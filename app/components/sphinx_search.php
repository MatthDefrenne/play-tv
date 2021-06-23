<?php

/**
 * PHPlay Framework.
 *
 * Sphinx assisted search component
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
class sphinx_search_component extends ppl_component
{
    const
        TYPE_CHANNELS = 'channels',
        TYPE_CASTS = 'casts',
        TYPE_PROGRAMS = 'programs',
        TYPE_GROUPS = 'groups',
        TYPE_VIDEOS = 'videos',
        MAX_RESULTS = 15;

    const
        CONNECT_TIMEOUT = 3, // in seconds
        QUERY_TIMEOUT = 3; // in seconds

    private $sphinx, // sphinx object instance
            $error = false;

    public $query; // last query

    /**
     *	init_sphinx.
     *
     *	@description initialize sphinx searchd api if not already done
     */
    private function init_sphinx()
    {
        if (isset($this->sphinx) === false) {
            $sphinx = new SphinxClient();
            $sphinx->SetServer('192.168.0.4', 9312);
            $sphinx->SetConnectTimeout(self::CONNECT_TIMEOUT);
            $sphinx->SetMaxQueryTime(self::QUERY_TIMEOUT * 1000);
            $sphinx->SetArrayResult(false);
            $sphinx->SetMatchMode(SPH_MATCH_EXTENDED2);
            $sphinx->SetSortMode(SPH_SORT_RELEVANCE);
            $sphinx->SetLimits(0, 150);
            $this->sphinx = $sphinx;
        }

        return $this;
    }

    /**
     *	add.
     *
     *	@description add a query to sphinx
     *
     *	@param $query string
     *	@param $indexes string
     *
     *	@return $this
     */
    private function add($query, $indexes)
    {
        $this->init_sphinx();
        if ($query !== '') {
            $this->sphinx->AddQuery($query, $indexes);
        }

        return $this;
    }

    /**
     *	run.
     *
     *	@description run queries
     */
    private function run()
    {
        if ($this->error === true) {
            return;
        }

        $this->init_sphinx();

        cerberus::enable(false);
        try {
            $results = $this->sphinx->RunQueries();
        } catch (Exception $e) {
            $this->error = true;
        }
        cerberus::enable(true);

        if (isset($results) && $results !== false) {
            return $results;
        }

        $this->error = true;

        return;
    }

    /**
     *	escape_query.
     *
     *	@description escape the query
     *
     *	@param $query string search keywords
     *
     *	@return string
     */
    public function escape_query($query)
    {
        if (empty($query)) {
            return '';
        }

        $query = mb_strtolower($this->sphinx->escapeString($query));
        $query = preg_replace(array('#\[[^\]]+\]#u', '#[\\\()!?&|@\[\],*"<>=^$~/-]#u', '#\s+#u'), array(' ', ' ', ' '), $query);

        return trim($query);
    }

    /**
     *	split_query.
     *
     *	@description split the query in words
     *
     *	@param $query string search keywords
     *
     *	@return string
     */
    public function split_query($query)
    {
        if (empty($query)) {
            return '';
        }

        $query = preg_replace(array('#\b[^\s]{1,3}\b#u', '#[\s.]+#u'), array('', ' | '), $query);

        return trim($query, '| ');
    }

    /**
     *	order_by_weight.
     *
     *	@description order an array of results by weight (DESC)
     *
     *	@param $results array
     *
     *	@return array
     */
    public function order_by_weight($results)
    {
        uasort($results, function ($a, $b) {
            if ($a['weight'] === $b['weight']) {
                if ($a['type'] === $b['type'] && $a['type'] === 'videos') {
                    return strtotime($a['added_date']) > strtotime($b['added_date']) ? -1 : 1;
                } elseif ($a['type'] === $b['type'] && $a['type'] === 'casts') {
                    return (int) $a['programs'] > (int) $b['programs'] ? -1 : 1;
                } elseif ($a['type'] !== $b['type']) {
                    return $a['type'] === 'groups' ? -1 : 1;
                }

                return 0;
            }

            return ($a['weight'] > $b['weight']) ? -1 : 1;
        });

        return $results;
    }

    /**
     *	search.
     *
     *	@description return an array of results for given query string
     *
     *	@param $query string search keywords
     *	@param $type string optional force a type
     *
     *	@return array search results
     */
    public function search($query, $type = null)
    {
        $this->init_sphinx();
        $results = array();

        $this->query = $this->escape_query($query);

        if (!is_null($type)) {
            // invalid type
            if ($type !== self::TYPE_CHANNELS && $type !== self::TYPE_CASTS && $type !== self::TYPE_PROGRAMS && $type !== self::TYPE_VIDEOS) {
                throw new ComponentException("type &laquo; {$type} &raquo; is not a valid search type.");
            }
            $func = "search_{$type}";

            return $this->$func($this->query);
        }

        $results[self::TYPE_CHANNELS] = $this->search_channels($this->query);
        $results[self::TYPE_CASTS] = $this->search_casts($this->query);
        $results[self::TYPE_PROGRAMS] = $this->search_programs($this->query);
        $results[self::TYPE_VIDEOS] = $this->search_videos($this->query);

        return $results;
    }

    /**
     *	search mobile.
     *
     *	@description return an array of results for given query string
     *
     *	@param $query string search keywords
     *
     *	@return array search results
     */
    public function search_mobile($query)
    {
        $this->init_sphinx();
        $results = array();
        $this->query = $this->escape_query($query);

        $channels = $this->search_channels($this->query, true);
        if (isset($channels) && $channels !== false) {
            $results[self::TYPE_CHANNELS] = $channels;
        }

        $programs = $this->search_programs($this->query, true);
        if (isset($programs) && $programs !== false) {
            foreach ($programs as &$program) {
                if (isset($program['programs']) && count($program['programs']) > 0) {
                    $program['programmes'] = $program['programs'];
                    unset($program['programs']);
                }
            }
            $results['programmes'] = $programs;
        }

        return (empty($results)) ? false : $results;
    }

    /**
     *	search_channels.
     *
     *	@description return an array of channels for given query
     *
     *	@param $query string search keywords
     *  @param $mobile bool if it's for mobile or not
     *
     *	@return array channels
     */
    private function search_channels($query, $mobile = false)
    {
        $this->init_sphinx();
        $results = array();
        $indexes = 'channels, channels2, channels3';

        if ($query !== '') {
            $this->add("@channel ^{$query}$", $indexes)
                ->add("@channel ({$query})", $indexes)
                ->add("^{$query}$", $indexes)
                ->add("({$query})", $indexes);

            $results = ($mobile === true) ? $this->parse_results($this->run(), self::TYPE_CHANNELS, array(), true) : $this->parse_results($this->run(), self::TYPE_CHANNELS);
            if (count($results) < 3) {
                $this->add("*{$query}*", $indexes);
                $this->add($this->split_query($query), $indexes);
                $results = ($mobile === true) ? $this->parse_results($this->run(), self::TYPE_CHANNELS, $results, true) : $this->parse_results($this->run(), self::TYPE_CHANNELS, $results);
            }
        }

        return ($mobile === true && empty($results)) ? false : array_slice($this->order_by_weight($results), 0, self::MAX_RESULTS, true);
    }

    /**
     *	search_casts.
     *
     *	@description return an array of casts (people) for given query
     *
     *	@param $query string search keywords
     *
     *	@return array casts
     */
    private function search_casts($query)
    {
        $this->init_sphinx();
        $results = array();
        $index = 'casts';
        if ($query !== '') {
            $this->sphinx->setFieldWeights(array('fullname' => 10, 'roles' => 4));
            $this->add("@fullname ^{$query}$", $index)
                ->add("@fullname ^{$query}$, @roles \"{$query}\"", $index)
                ->add("{$query}", $index);
            $results = $this->parse_results($this->run(), self::TYPE_CASTS);
            if (count($results) < 3) {
                $this->add("*{$query}*", $index);
                $this->add($this->split_query($query), $index);
                $results = $this->parse_results($this->run(), self::TYPE_CASTS, $results);
            }
        }

        return array_slice($this->order_by_weight($results), 0, self::MAX_RESULTS, true);
    }

    /**
     *	search_programs.
     *
     *	@description return an array of programs for given query
     *
     *	@param $query string search keywords
     *  @param $mobile bool if it's for mobile or not
     *
     *	@return array programs
     */
    private function search_programs($query, $mobile = false)
    {
        $this->init_sphinx();
        $results = array();
        $indexes = array('recent_programs', 'archived_programs');
        $coefficient = $count = count($indexes);
        if ($query !== '') {
            foreach ($indexes as $index) {
                $multiplier = ($coefficient * $count);
                $weights = array('title' => (int) (8 * $multiplier), 'subtitle' => (int) (4 * $multiplier));
                $this->sphinx->setFieldWeights($weights);
                $this->add("@title ^{$query}$", $index)
                    ->add("@title ^{$query}$", $index)
                    ->add("@title \"{$query}\"", $index)
                    ->add("@title ({$query})", $index)
                    ->add("@subtitle ({$query}) | @originaltitle ({$query})", $index)
                    ->add("{$query}", $index);
                $results = ($mobile === true) ? $this->parse_results($this->run(), self::TYPE_PROGRAMS, $results, true) : $this->parse_results($this->run(), self::TYPE_PROGRAMS, $results);

                if (count($results) < 3) {
                    $this->add("*{$query}*", $index);
                    $trunc_query = $this->split_query($query);
                    if ($trunc_query !== '') {
                        $weights = array('title' => (int) (6 * $multiplier), 'subtitle' => (int) (3 * $multiplier));
                        $this->sphinx->setFieldWeights($weights);
                        $this->add("@title ({$trunc_query})", $index)
                            ->add("@subtitle ({$trunc_query}) | @originaltitle ({$trunc_query})", $index);
                    }
                    $results = ($mobile === true) ? $this->parse_results($this->run(), self::TYPE_PROGRAMS, $results, true) : $this->parse_results($this->run(), self::TYPE_PROGRAMS, $results);
                }
                --$multiplier;
            }
        }

        $this->add("@title ^{$query}$", 'groups');
        $this->add("@title ^{$query}$", 'groups');
        $this->add("@title \"{$query}\"", 'groups');
        $this->add("@title ({$query})", 'groups');
        $this->add("@title {$query}", 'groups');
        $query = $this->split_query($query);
        $this->add("@title {$query}", 'groups');
        $groups = ($mobile === true) ? $this->parse_results($this->run(), self::TYPE_GROUPS, array(), true) : $this->parse_results($this->run(), self::TYPE_GROUPS);

        if (count($groups) > 0) {
            foreach ($results as $key => $result) {
                if (is_null($result['group_id']) || !isset($groups[$result['group_id']])) {
                    continue;
                }
                if (count($groups[$result['group_id']]['programs']) < 3) {
                    $groups[$result['group_id']]['programs'][$key] = $result;
                }
                if ($result['weight'] > $groups[$result['group_id']]['weight']) {
                    $groups[$result['group_id']]['weight'] = $result['weight'];
                }
                unset($results[$key]);
            }
        }

        $results = $this->order_by_weight(array_merge($groups, $results));

        return ($mobile === true && empty($results)) ? false : array_slice($results, 0, self::MAX_RESULTS, true);
    }

    /**
     *	search_videos.
     *
     *	@description return an array of videos for given query
     *
     *	@param $query string search keywords
     *
     *	@return array videos
     */
    private function search_videos($query)
    {
        $this->init_sphinx();
        $results = array();
        $indexes = array('recent_replay_videos', 'archived_replay_videos');
        if ($query !== '') {
            foreach ($indexes as $index) {
                $this->sphinx->setFieldWeights(array('title' => 6, 'program_title' => 5, 'group_title' => 2, 'group_program_title' => 2));
                $this->add("@title ^{$query}$ | @program_title ^{$query}$ | @group_title ^{$query}$ | @program_group_title ^{$query}$", $index)
                    ->add("@title ^{$query}$ | @program_title ^{$query}$ | @group_title ^{$query}$ | @program_group_title ^{$query}$", $index)
                    ->add("@title \"{$query}\" | @program_title \"{$query}\" | @group_title \"{$query}\" | @program_group_title \"{$query}\"", $index)
                    ->add("@title ({$query}) | @program_title ({$query}) | @group_title ({$query}) | @program_group_title ({$query})", $index)
                    ->add("{$query}", $index);
                $results = $this->parse_results($this->run(), self::TYPE_VIDEOS, $results);
                if (count($results) < 3) {
                    $this->add("*{$query}*", $index);
                    $trunc_query = $this->split_query($query);
                    if ($trunc_query !== '') {
                        $this->add("@title ({$trunc_query}) | @program_title ({$trunc_query}) | @group_title ({$trunc_query}) | @program_group_title ({$trunc_query})", $index);
                    }
                    $results = $this->parse_results($this->run(), self::TYPE_VIDEOS, $results);
                    continue;
                }
            }
        }

        return array_slice($this->order_by_weight($results), 0, self::MAX_RESULTS, true);
    }

    /**
     *	format_result.
     *
     *	@description format a result with label, url etc. (accounting for type)
     *
     *	@param $results array
     *	@param $type string type of results (programs, channels etc.)
     *
     *	@return array results
     */
    private function format_result($result, $type)
    {
        $_tools = $this->load('tools');
        $return = array();

        switch ($type) {
            case self::TYPE_CHANNELS:
                $return['label'] = $result['attrs']['channel'];
                $return['url'] = $_tools->channel_page_url($result['attrs']['alias']);
                $return['image_path'] = $_tools->channel_img_path($result['attrs']['channel_id'], $_tools::CHANNEL_IMG_SMALL, false, $this->globals->get('static_base_url'));
                $return['order'] = (isset($result['attrs']['order']) ? $result['attrs']['order'] : null);
                break;

            case self::TYPE_CASTS:
                $return['label'] = $result['attrs']['fullname'];
                $return['programs'] = $result['attrs']['programs'];
                $return['url'] = $_tools->cast_page_url($result['attrs']['cast_id'], $return['label']);
                break;

            case self::TYPE_PROGRAMS:
                $return['label'] = $this->load('tools')->program_fulltitle($result['attrs']);
                $return['title'] = $return['label'];
                $return['group_id'] = $result['attrs']['group_id'];
                $return['program_id'] = $result['attrs']['program_id'];
                $return['url'] = $_tools->program_page_url($result['attrs']['program_id'], $result['attrs']['title']);
                $return['image_path'] = $_tools->program_img_path($result['attrs']['image_id']);
                break;

            case self::TYPE_GROUPS:
                $return['label'] = $result['attrs']['title'];
                $return['group_id'] = $result['attrs']['group_id'];
                $return['title'] = $return['label'];
                $return['programs'] = array();
                $return['url'] = $_tools->group_page_url($result['attrs']['group_id'], $result['attrs']['type_id'], $return['label']);
                $return['image_path'] = $_tools->program_img_path($result['attrs']['image_id']);
                break;

            case self::TYPE_VIDEOS:
                $return = $this->load('replay_tv')->hydrate_video($result['attrs']);
                break;
        }

        $return['type'] = $type;
        $return['weight'] = $result['weight'];

        return $return;
    }

    /**
     *	parse_results.
     *
     *	@description parse multiple results and organize them
     *
     *	@param $queries_results array results from RunQueries sphinx
     *	@param $type string type of results (programs, channels etc.)
     *  @param $results array $results data
     *  @param $mobile bool if i'ts for mobile or not
     *
     *	@return array results
     */
    private function parse_results($queries_results, $type, $results = array(), $mobile = false)
    {
        if (!is_array($queries_results)) {
            return array();
        }

        $count = count($queries_results);

        for ($q = 0; $q < $count; ++$q) {
            $query = &$queries_results[$q];

            if (isset($query['error']) === true && empty($query['error']) === false) {
                return $results;
            }

            if (isset($query['matches']) === false || count($query['matches']) === 0) {
                continue;
            }
            foreach ($query['matches'] as $id => $result) {
                if (isset($results[$id]) === true) {
                    $results[$id]['weight'] += $result['weight'];
                    continue;
                }
                $results[$id] = ($mobile === true) ? $this->format_mobile_result($result, $type) : $this->format_result($result, $type);
            }
        }
        unset($queries_results);

        return $results;
    }
}
