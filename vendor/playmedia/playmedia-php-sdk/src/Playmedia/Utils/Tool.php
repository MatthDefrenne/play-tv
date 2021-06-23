<?php

namespace Playmedia\Utils;

/**
 * Tool utils class.
 *
 * @author Jimmy Phimmasone <jimmy@playmedia.fr>
 */
class Tool
{
    private static $staticUrl;

    /**
     * Get slug from the program title.
     *
     * @param $string string the string to convert
     *
     * @return string
     */
    public static function slugify($string, $tolowercase = true, $separator = '-')
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

    /**
     * Get image directory (ex: 500-1001).
     *
     * @param int $imageId
     *
     * @return string
     */
    public static function getImageDirectory($imageId)
    {
        $max = 500; // max image id per directory

        $c = intval($imageId / $max);
        $lo = ($c * $max) + 1;
        $hi = ($c * $max) + $max;

        if ($imageId < $lo) {
            $lo -= $max;
            $hi -= $max;
        }

        return "$lo-$hi";
    }

    public static function getImageUrl($imageId, $size)
    {
        return sprintf('%s/img/tv_programs/%s/%s_%s.jpg', self::$staticUrl, self::getImageDirectory($imageId), $imageId, $size);
    }

    /**
     * Format the dates to a more readable string in french(ex : lundi 15 mars, 15/04/2011 etc.).
     *
     * @param $timestamp timestamp
     *
     * @example readble_date('11/07/2011') returns "Lundi 11 Juillet 2011"
     *
     * @return string
     */
    public static function readableDate($timestamp, $shortcuts = false, $displayDay = true, $displayYear = true)
    {
        if (!is_numeric($timestamp)) {
            return;
        }

        if (true === $shortcuts) {
            $today = strtotime(date('Y-m-d 00:00:00'));
            $day = strtotime(date('Y-m-d 00:00:00', $timestamp));

            if ($today === $day) {
                return date('H', $timestamp) >= 19 ? 'Ce soir' : "Aujourd'hui";
            } elseif (($today + 86400) === $day) {
                return 'Demain';
            }
        }

        $days = array(
            'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche',
        );
        $months = array(
            'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre',
        );

        $day = $days[date('N', $timestamp) - 1];
        $month = mb_strtolower($months[date('n', $timestamp) - 1]);

        return ($displayDay ? "{$day} " : '').date('j', $timestamp)." {$month}".($displayYear ? ' '.date('Y', $timestamp) :  '');
    }

    public static function init(array $config)
    {
        if (isset($config['static_url'])) {
            self::$staticUrl = $config['static_url'];
        }
    }
}
