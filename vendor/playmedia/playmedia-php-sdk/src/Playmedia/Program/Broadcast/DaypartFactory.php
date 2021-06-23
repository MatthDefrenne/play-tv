<?php

namespace Playmedia\Program\Broadcast;

/**
 * Dayparting is the practice of dividing the broadcast day into several parts, in which a different type of radio or television program apropos for that time period is aired.
 *
 * @link https://en.wikipedia.org/wiki/Dayparting
 */
abstract class DaypartFactory
{
    const PRIMETIME_EARLY_FRINGE = 'primetime.early_fringe';
    const PRIMETIME_LATE_FRINGE = 'primetime.late_fringe';
    const LATE_NIGHT = 'late_night';
    const OVERNIGHT = 'overnight';

    const LEGACY_PRIMETIME = 'primetime';
    const LEGACY_LATE_FRINGE = 'latefringe';
    const LEGACY_GRAVEYARD = 'graveyard';

    public function createDaypart($daypart, \DateTime $date)
    {
        $start = $this->cloneDate($date);
        $end = $this->cloneDate($date);

        if (self::LEGACY_PRIMETIME === $daypart) {
            $daypart = self::PRIMETIME_EARLY_FRINGE;
        }
        if (self::LEGACY_LATE_FRINGE === $daypart) {
            $daypart = self::PRIMETIME_LATE_FRINGE;
        }
        if (self::LEGACY_GRAVEYARD === $daypart) {
            $daypart = self::LATE_NIGHT;
        }

        $this->setTime($daypart, $start, $end);

        return new Daypart($daypart, $start, $end);
    }

    abstract protected function cloneDate(\DateTime $date);
    abstract protected function setTime($daypart, \DateTime $start, \DateTime $end);
}
