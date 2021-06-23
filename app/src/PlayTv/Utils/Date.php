<?php

namespace PlayTv\Utils;

class Date
{
    public static function diffSeconds(\DateTime $start, \DateTime $end)
    {
        $diff = $start->diff($end);

        $hours = $diff->format('%h');
        $minutes = $diff->format('%i');
        $seconds = $diff->format('%s');

        return ($hours * 60 * 60) + ($minutes * 60) + $seconds;
    }
}
