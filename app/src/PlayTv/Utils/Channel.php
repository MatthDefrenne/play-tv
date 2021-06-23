<?php

namespace PlayTv\Utils;

use Symfony\Component\Routing\Route;

class Channel
{
    const CATEGORY_RADIO = 7; // Category id in database

    public static function isAvailable($from, $to, $moment = 'NOW')
    {
        if (is_string($moment)) {
            $moment = new \DateTime($moment);
        }

        $from = new \DateTime($from);
        $to = new \DateTime($to);

        if ($to->format('H') < $from->format('H')) {
            $midnight = new \DateTime('00:00:00');

            if ($moment < $from) {
                $midnight->modify('+1 DAY');
            }

            // Before midnight, $to = today and $from = tomorrow
            // After midnight, $from = yesterday and $to = today
            if ($moment > $midnight) {
                $to->modify('+1 DAY');
            } else {
                $from->modify('-1 DAY');
            }
        }

        return $moment > $from && $moment < $to;
    }

    public static function nextAvaibility($from, $moment = 'NOW')
    {
        if (is_string($moment)) {
            $moment = new \DateTime($moment);
        }

        $from = new \DateTime($from);
        $from->modify('+1 DAY');

        return $moment->diff($from)->format('%H h %I m');
    }

    public static function getRouteParameters(Route $route, array $channel)
    {
        $pathVariables = $route->compile()->getPathVariables();
        $parameters = ['channel_alias' => $channel['alias']];
        if (in_array('channel_id', $pathVariables)) {
            $parameters['channel_id'] = $channel['id'];
        }

        return $parameters;
    }

    public static function satisfiesWebsite(array $channel, array $websites)
    {
        $categories = [
            'tnt' => 'tnt',
            'national' => 'national',
            'locale' => 'locale',
        ];

        foreach ($websites as $website) {
            if (!isset($categories[$channel['category_alias']])) {
                continue;
            }
            if ($channel['country'] !== $website->getCountry()) {
                continue;
            }

            return $website;
        }

        return;
    }

    public static function isRadio(array $channel)
    {
        $categoryId = null;

        if (isset($channel['category_id'])) {
            $categoryId = (int) $channel['category_id'];
        }

        return $categoryId === self::CATEGORY_RADIO;
    }
}
