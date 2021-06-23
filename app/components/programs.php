<?php

/**
 *    programs component.
 *
 *    @description EPG datas (programs, broadcasts etc.)
 */
class programs_component extends ppl_component
{
    public function is_valid_date($date)
    {
        if (!preg_match('/^(\d{2})-(\d{2})-(\d{4})$/', $date, $matches) || !checkdate($matches[2], $matches[1], $matches[3])) {
            return false;
        }

        return $this->belongs_to_range($date);
    }

    public function is_valid_i18n_date($date)
    {
        if (!preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $date, $matches) || !checkdate($matches[2], $matches[3], $matches[1])) {
            return false;
        }

        return $this->belongs_to_range($date);
    }

    public function belongs_to_range($date)
    {
        // oldest broadcasted program
        $minDate = new DateTime('2009-09-03');
        // futurest broadcasted program is J+8, cf epg grabbers
        $maxDate = new DateTime('+8 days');
        // current
        $curDate = new DateTime($date);

        $belongsToRange = ($curDate >= $minDate && $curDate <= $maxDate);

        return $belongsToRange;
    }

    /**
     *    get_dates_range.
     *
     *    @description: returns the validity dates range
     */
    public function get_dates_range()
    {
        $range = $this->globals->get('validity_dates_range'); // try to get it from the globals cache

        if (is_null($range) === false) {
            return $range;
        } // from cache

        $now = $this->globals->get('date.today');

        $min = $now - 259200; // - 3 days
        $max = $this->globals->get('date.max');
        $_tools = $this->load('tools');
        $min = $_tools->to_day_start($min);
        $max = $_tools->to_day_start($max);

        $range = array();
        for ($d = $min; $d <= $max; $d += 86400) {
            $range[] = $_tools->to_day_start($d);
        }

        $this->globals->set('validity_dates_range', $range);

        return $range;
    }
}
