<?php

namespace Playmedia\Program\Broadcast;

class DaypartFactoryGb extends DaypartFactory
{
    protected function cloneDate(\DateTime $date)
    {
        return new \DateTime($date->format('Y-m-d'), new \DateTimeZone('Europe/London'));
    }

    protected function setTime($daypart, \DateTime $start, \DateTime $end)
    {
        switch ($daypart) {
            case self::PRIMETIME_EARLY_FRINGE:
                $start->setTime(18, 30, 00);
                $end->setTime(20, 00, 00);
                break;
            case self::PRIMETIME_LATE_FRINGE:
                $start->setTime(20, 00, 00);
                $end->setTime(22, 00, 00);
                break;
            case self::LATE_NIGHT:
                break;
            case self::OVERNIGHT:
                break;
            default:
                throw new \InvalidArgumentException("Unknown daypart {$daypart}");
        }
    }
}
