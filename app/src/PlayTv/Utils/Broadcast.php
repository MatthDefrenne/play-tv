<?php

namespace PlayTv\Utils;

class Broadcast
{
    /**
     * Returns a new array without broadcasts that started before $now.
     *
     * @param array    $broadcasts
     * @param DateTime $now
     *
     * @return array
     */
    public static function filterStartedBroadcasts(array $broadcasts, \DateTime $now = null)
    {
        if (null === $now) {
            $now = new \DateTime('NOW');
        }

        foreach ($broadcasts as $key => $broadcast) {
            $start = new \DateTime($broadcast['start']);
            if ($now >= $start) {
                unset($broadcasts[$key]);
            }
        }

        return $broadcasts;
    }

    /**
     * Returns the closest starting broadcast.
     *
     * @param array $broadcasts
     *
     * @return array
     */
    public static function pickFirstStartingBroadcast(array $broadcasts)
    {
        uasort($broadcasts, function ($a, $b) {
            $startA = new \DateTime($a['start']);
            $startB = new \DateTime($b['start']);
            if ($startA === $startB) {
                return 1;
            }

            return $startA > $startB ? 1 : -1;
        });

        return array_shift($broadcasts);
    }

    /**
     *
     */
    public static function pickFirstFinishingBroadcast(array $broadcasts)
    {
        uasort($broadcasts, function ($a, $b) {
            $endA = new \DateTime($a['end']);
            $endB = new \DateTime($b['end']);
            if ($endA === $endB) {
                return 1;
            }

            return $endA > $endB ? 1 : -1;
        });

        return array_shift($broadcasts);
    }
}
