<?php

namespace Playmedia\Program\Broadcast;

class DaypartFactoryFr extends DaypartFactory
{
    protected function cloneDate(\DateTime $date)
    {
        return new \DateTime($date->format('Y-m-d'), new \DateTimeZone('Europe/Paris'));
    }

    protected function setTime($daypart, \DateTime $start, \DateTime $end)
    {
        switch ($daypart) {
            case self::PRIMETIME_EARLY_FRINGE:
                $start->setTime(20, 45, 00);
                $end->setTime(22, 30, 00);
                break;
            case self::PRIMETIME_LATE_FRINGE:
                $start->setTime(22, 30, 00);
                $end->modify('+1 day');
                $end->setTime(00, 00, 00);
                break;
            case self::LATE_NIGHT:
                $start->modify('+1 day');
                $start->setTime(00, 00, 00);
                $end->modify('+1 day');
                $end->setTime(02, 00, 00);
                break;
            case self::OVERNIGHT:
                break;
            default:
                throw new \InvalidArgumentException("Unknown daypart {$daypart}");
        }
    }
}
