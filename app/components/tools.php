<?php

/**
 *	tools_component.
 *
 *	@description generic tools and helpers
 *
 *	@author Playmedia <contact at playmedia dot fr>
 */
class tools_component extends ppl_component
{
    const
        CHANNEL_IMG_MEDIUM = 'medium',
        CHANNEL_IMG_SMALL = 'small',
        CHANNEL_IMG_MINI = 'mini',
        PROGRAM_IMG_MEDIUM = 'medium',
        PROGRAM_IMG_SMALL = 'small',
        USER_AVATAR_IMG_MEDIUM = 'medium',
        USER_AVATAR_IMG_SMALL = 'small',
        USER_AVATAR_IMG_LARGE = 'large';

    /**
     *	channel_img_path.
     *
     *	@description return given channel logo image relative path
     *
     *	@param $channel_id int
     *	@param $format int optional
     *
     *	@return string
     */
    public function channel_img_path($channel_id, $format = self::CHANNEL_IMG_MINI, $all_format = false, $static_base_url = null)
    {
        if (is_null($channel_id) || $channel_id == 0) {
            return;
        } elseif (is_numeric($channel_id) === false) {
            throw new ComponentException('$channel_id param must be numeric');
        }
        if ($all_format === false) {
            return "/img/tv_channels/{$channel_id}_{$format}.png";
        } else {
            if ($static_base_url === null) {
                return;
            }
            $channel['mini'] = $static_base_url."/img/tv_channels/{$channel_id}_".self::CHANNEL_IMG_MINI.'.png';
            $channel['small'] = $static_base_url."/img/tv_channels/{$channel_id}_".self::CHANNEL_IMG_SMALL.'.png';
            $channel['medium'] = $static_base_url."/img/tv_channels/{$channel_id}_".self::CHANNEL_IMG_MEDIUM.'.png';
            $channel['source'] = $static_base_url."/img/tv_channels/{$channel_id}_source.png";

            return $channel;
        }
    }

    /**
     *	channel_page_url.
     *
     *	@description return given channel page url (ex: /chaine-tv/france-2/
     *
     *	@param $channel_alias string
     *
     *	@return string
     */
    public function channel_page_url($channel_alias)
    {
        return "/chaine-tv/{$channel_alias}/";
    }

    /**
     *	channel_play_url.
     *
     *	@description return given channel play url (ex: /television/france-2/
     *
     *	@param $channel_alias string
     *
     *	@return string
     */
    public function channel_play_url($channel_alias)
    {
        return "/television/{$channel_alias}/";
    }

    /**
     *	channel_broadcast_url.
     *
     *	@description return given channel broadcast url (ex: /programmes-tv/france-2/
     *
     *	@param $channel_alias string
     *
     *	@return string
     */
    public function channel_broadcast_url($channel_alias)
    {
        return "/programmes-tv/{$channel_alias}/";
    }

    /**
     *	program_img_path.
     *
     *	@description return given program image relative path
     *
     *	@param $image_id int
     *	@param $format int optional
     *
     *	@return string
     */
    public function program_img_path($image_id, $format = self::PROGRAM_IMG_SMALL)
    {
        if (is_null($image_id) || $image_id == 0) {
            return;
        } elseif (is_numeric($image_id) === false) {
            throw new ComponentException('$image_id param must be numeric');
        }
        $dir = $this->image_directory($image_id);

        return "/img/tv_programs/{$dir}/{$image_id}_{$format}.jpg";
    }

    /**
     *	program_page_url.
     *
     *	@description return given program page url (ex: /programme-tv/145/titre-du-programme/
     *
     *	@param $program_id int
     *	@param $program_title string
     *
     *	@return string
     */
    public function program_page_url($program_id, $program_title)
    {
        $slug = $this->permalink($program_title);

        return "/programme-tv/{$program_id}/{$slug}/";
    }

    /**
     *	cast_page_url.
     *
     *	@description return given cast page url (ex: /people/123/gerard-depardieu/
     *
     *	@param $cast_id int
     *	@param $cast_title string
     *
     *	@return string
     */
    public function cast_page_url($cast_id, $cast_title)
    {
        $slug = $this->permalink($cast_title);

        return "/people/{$cast_id}/{$slug}/";
    }

    /**
     * Build the replay video page URL.
     * (to display the popup window page, or embbed video page).
     *
     * @param int    $video_id The replay video ID
     * @param string $title    The video title
     * @param string $date     The broadcast date
     *
     * @return string The video page URL
     */
    public function video_page_url($video_id, $title, $date)
    {
        if (!empty($date)) {
            $tmp_date_hour = explode(' ', $date);
            $tmp_date = explode('-', $tmp_date_hour[0]);
            $date = "{$tmp_date[2]}-{$tmp_date[1]}-{$tmp_date[0]}";

            return "/replay/{$video_id}/{$this->permalink($title)}/{$date}/";
        } else {
            return "/replay/{$video_id}/{$this->permalink($title)}/";
        }
    }

    /**
     *	group_page_url.
     *
     *	@description return given group page url (ex: /serie-tv/123/les-experts)
     *
     *	@param $group_id int
     *	@param $group_type_id int
     *	@param $group_title string
     *
     *	@return string
     */
    public function group_page_url($group_id, $group_type_id, $group_title)
    {
        switch ($group_type_id) {
            case 1:
                $page = 'serie-tv';
                break;
            case 2:
                $page = 'films'; // films
                break;
            case 3:
                $page = 'emission';
                break;
            default:
                $page = 'groupe';
                break;
        }

        return "/{$page}/{$group_id}/".$this->permalink($group_title).'/';
    }

    /**
     *	broadcast_abbreviation.
     *
     *	@param $program array
     *	@description return tv shows abbreviation (ex: S01e21, épisode 12 etc.)
     *
     *	@return string
     */
    public function broadcast_abbreviation($program)
    {
        $abbreviation = $parts = '';

        if (isset($program['part']) && $program['part'] !== 0 && isset($program['parts']) && $program['parts'] > 1) {
            $parts .= "({$program['part']}/{$program['parts']})";
        } elseif (isset($program['part']) && $program['part'] !== 0) {
            $parts .= "partie {$program['part']}";
        }

        if ((!isset($program['gender_id']) || (isset($program['gender_id']) && ((int) $program['gender_id'] === 26 || (int) $program['gender_id'] === 30))) && isset($program['season']) && $program['season'] !== 0 && isset($program['episode']) && $program['episode'] != 0 && $program['episode'] < 100 && (!isset($program['episodes']) || ($program['episodes'] !== 0 && $program['episodes'] < 100))) {
            $abbreviation .= 'S'.str_pad($program['season'], 2, '0', STR_PAD_LEFT).'E'.str_pad($program['episode'], 2, '0', STR_PAD_LEFT);
            $abbreviation .= (!empty($parts) ? " {$parts}" : '');
        } elseif (isset($program['episode']) && $program['episode'] !== 0 && isset($program['episodes']) && $program['episodes'] !== 0 && $program['episodes'] < 100 && empty($parts)) {
            $abbreviation .= "({$program['episode']}/{$program['episodes']})";
        } elseif (isset($program['episode']) && $program['episode'] !== 0) {
            $abbreviation .= "épisode {$program['episode']}";
            $abbreviation .= (!empty($parts) ? " {$parts}" : '');
        } else {
            $abbreviation .= (!empty($parts) ? " {$parts}" : '');
        }

        return isset($abbreviation) ? trim($abbreviation) : null;
    }

    /**
     *	program_fulltitle.
     *
     *	@param $program array
     *	@description return tv shows full title
     *
     *	@return string
     */
    public function program_fulltitle($program)
    {
        if (isset($program['title'])) {
            $title = $program['title'];
        } else {
            $title = '';
        }

        $abbreviation = $this->broadcast_abbreviation($program);

        return trim("{$title} {$abbreviation}");
    }

    /**
     *	image_directory.
     *
     *	@param $image_id
     *	@description return the image directory (ex: 500-1001)
     *
     *	@return string
     */
    public function image_directory($image_id)
    {
        $max = 500; // max image id per directory

        $c = intval($image_id / $max);
        $lo = ($c * $max) + 1;
        $hi = ($c * $max) + $max;

        if ($image_id < $lo) {
            $lo -= $max;
            $hi -= $max;
        }

        return "$lo-$hi";
    }

    /**
     *	elapsed.
     *
     *	@description return elapsed time between start and now (datas). return also the progression percentage
     *
     *	@param $start mixed start date (string) or start timestamp (int)
     *	@param $duration int total duration in minutes
     *	@param $now mixed optional now timestamp or null
     *
     *	@return array
     */
    public function elapsed($start, $end = null, $now = null)
    {
        if (!is_int($now)) {
            $now = $this->globals->get('date.now');
        }

        if (is_string($start)) {
            $start = (int) strtotime($start);
            if ($start === 0) {
                return;
            }
        }
        if (is_string($end)) {
            $end = (int) strtotime($end);
            if ($end === 0) {
                return;
            }
        }

        if ($start > $now) {
            $minutes = $percent = 0;
        } else {
            $minutes = (int) $this->since($start, $now);
            $percent = (int) floor(($minutes / (($end - $start) / 60)) * 100);
        }

        return array('minutes' => $minutes, 'percent' => $percent);
    }

    /**
     *	since.
     *
     *	@description return minutes elapsed since $time
     *
     *	@param $time mixed time
     *
     *	@return int
     */
    public function since($time, $now = null)
    {
        if (!is_int($now)) {
            $now = $this->globals->get('date.now');
        }

        if (is_string($time)) {
            $time = (int) strtotime($time);
            if ($time === 0) {
                return;
            }
        }

        return floor(($now - $time) / 60);
    }

    /**
     *	next_minute_start_in.
     *
     *	@description next minute start in x seconds
     *
     *	@return int
     */
    public function next_minute_start_in()
    {
        $now = time();

        return (mktime(date('H', $now), date('i', $now), 0) + 60) - $now;
    }

    /**
     *	next_day_start_in.
     *
     *	@description next minute start in x seconds
     *
     *	@return int
     */
    public function next_day_start_in()
    {
        $now = time();

        return ($this->to_day_start($now) + 86400) - $now;
    }

    /**
     *	next_hour_start_in.
     *
     *	@description next hour start in x seconds
     *
     *	@return int
     */
    public function next_hour_start_in()
    {
        $now = time();

        return (mktime(date('H', $now), 0, 0) + 3600) - $now;
    }

    /**
     *	convert_date.
     *
     *	@description transform an FR date to a formatted MySQL date (ISO format) or to a timestamp
     *
     *	@param $date string the date in FR format
     *
     *	@example convert_date('31-03-2001', true) returns 2001-03-31
     *
     *	@return mixed
     */
    public function convert_date($date, $to_mysql = false)
    {
        if (!preg_match('#(?:[0-9]{2}-){2}[0-9]{4}#', $date)) {
            return;
        }

        list($day, $month, $year) = explode('-', $date);

        if (!checkdate($month, $day, $year)) {
            return;
        }

        if ($to_mysql === true) {
            return "{$year}-{$month}-{$day}";
        } else {
            return mktime(0, 0, 0, $month, $day, $year);
        }
    }

    /**
     *	edit_timestamp.
     *
     *	@return mixed
     */
    public function edit_timestamp($timestamp, $hour, $min, $sec, $to_mysql = false)
    {
        if (!is_int($timestamp)) {
            return;
        }

        return mktime($hour, $min, $sec, date('m', $timestamp), date('d', $timestamp), date('Y', $timestamp));
    }

    /**
     *	to_day_start.
     *
     *	@return mixed
     */
    public function to_day_start($timestamp, $to_mysql = false)
    {
        return $this->edit_timestamp($timestamp, 0, 0, 0, $to_mysql);
    }

    /**
     *	to_day_end.
     *
     *	@return mixed
     */
    public function to_day_end($timestamp, $to_mysql = false)
    {
        return $this->edit_timestamp($timestamp, 23, 59, 59, $to_mysql);
    }

    /**
     *	to_mysql.
     *
     *	@return mixed
     */
    public function to_mysql($timestamp = null, $day_only = false)
    {
        if (is_null($timestamp)) {
            $timestamp = time();
        }

        return date('Y-m-d'.($day_only !== true ? ' H:i' : ''), $timestamp).($day_only !== true ? ':00' : '');
    }

    /**
     *	permalink.
     *
     *	@description return a slugged string for permalinks (ex : "France 2" become "france-2")
     *
     *	@param $string string the string to convert
     *
     *	@return string
     */
    public function permalink($string, $tolowercase = true, $separator = '-')
    {
        $string = str_replace(array('&'), array('et'), $string);
        $string = preg_replace(array('#\bII\b#', '#\bIII\b#', '#\bIV\b#'), array('2', '3', '4'), $string);
        $string = str_replace(array(' ', ',', ':', '?', '!', '-'), $separator, $string);

        // Transliterate all non-ASCII characters
        // @link http://stackoverflow.com/questions/3542717/how-to-remove-accents-and-turn-letters-into-plain-ascii-characters/16022459#16022459
        $string = transliterator_transliterate('Any-Latin; Latin-ASCII; [\u0080-\u7fff] remove', $string);

        $string = trim(preg_replace(array("#[^a-zA-Z0-9{$separator}']+#u", "#{$separator}+#u"), array('', $separator), utf8_encode($string)), $separator);

        return $tolowercase ? mb_strtolower($string) : $string;
    }
}
