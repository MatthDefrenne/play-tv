<?php

namespace Playmedia\Component;

use Playmedia\Component\Channel as ChannelComponent;
use Playmedia\Component\Program as ProgramComponent;

/**
 * Broadcast component aware of timezones.
 */
class BroadcastTimezone extends Broadcast
{
    private $timezone;
    private $now;

    public function __construct($conn, $caching, ChannelComponent $channelComponent, ProgramComponent $programComponent, \DateTimeZone $timezone)
    {
        parent::__construct($conn, $caching, $channelComponent, $programComponent);
        $this->timezone = $timezone;
        $this->now = new \DateTime('now', $this->timezone);
    }

    private function applyTimezoneOffset(&$broadcast)
    {
        // Avoid applying offset twice
        if (isset($broadcast['timezone_offset']) && $broadcast['timezone_offset']) {
            return;
        }

        $start = new \DateTime($broadcast['start'], new \DateTimeZone('UTC'));
        $start->setTimezone($this->timezone);

        $end = new \DateTime($broadcast['end'], new \DateTimeZone('UTC'));
        $end->setTimezone($this->timezone);

        $broadcast['start'] = $start->format('Y-m-d H:i:s');
        $broadcast['end'] = $end->format('Y-m-d H:i:s');
        $broadcast['timezone_offset'] = true;
    }

    private function applyIsLive(&$broadcast)
    {
        $broadcast['is_live'] = new \DateTime($broadcast['start'], $this->timezone) <= $this->now && new \DateTime($broadcast['end'], $this->timezone) > $this->now;
    }

    protected function applyProgress(&$broadcast)
    {
        $this->applyTimezoneOffset($broadcast); // Make sure offset is applied

        $start = new \DateTime($broadcast['start'], $this->timezone);

        $diff = $start->diff($this->now);
        $hours = $diff->format('%h');
        $minutes = $diff->format('%i');
        $elapsed = (($hours * 60) + $minutes);

        if ($broadcast['bcast_duration'] > 0) {
            $broadcast['progress'] = ($elapsed * 100) / $broadcast['bcast_duration'];
        } elseif ($broadcast['program']['duration'] > 0) {
            $broadcast['progress'] = ($elapsed * 100) / $broadcast['program']['duration'];
        } else {
            $broadcast['progress'] = 0; // no duration => no progress
        }

        $broadcast['elapsed'] = array(
            'percent' => floor($broadcast['progress']),
            'minutes' => $elapsed,
        );
    }

    protected function getDaypart(\DateTime $date, $name)
    {
        $daypart = parent::getDaypart($date, $name);

        $daypart->getStart()->setTimezone(new \DateTimeZone('UTC'));
        $daypart->getEnd()->setTimezone(new \DateTimeZone('UTC'));

        return $daypart;
    }

    public function getPrimeBroadcasts($date, $channelsList, $context = 'primetime', $exclude = array())
    {
        $broadcasts = parent::getPrimeBroadcasts($date, $channelsList, $context, $exclude);

        foreach ($broadcasts as &$broadcast) {
            $this->applyTimezoneOffset($broadcast);
            $this->applyIsLive($broadcast);
        }

        return $broadcasts;
    }

    public function getDailyBroadcastByChannel($identifier, $date)
    {
        $broadcasts = parent::getDailyBroadcastByChannel($identifier, $date);

        foreach ($broadcasts as &$broadcast) {
            $this->applyTimezoneOffset($broadcast);
            $this->applyIsLive($broadcast);
        }

        return $broadcasts;
    }

    protected function _getDailyBroadcastByChannel($identifier, $date)
    {
        $broadcasts = parent::_getDailyBroadcastByChannel($identifier, $date);

        foreach ($broadcasts as &$broadcast) {
            $this->applyTimezoneOffset($broadcast);
            $this->applyIsLive($broadcast);
        }

        return $broadcasts;
    }

    public function getTimeslotBroadcast($startDate, $endDate, $channelsList)
    {
        $start = new \DateTime($startDate, $this->timezone);
        $start->setTimezone(new \DateTimeZone('UTC'));

        $end = new \DateTime($endDate, $this->timezone);
        $end->setTimezone(new \DateTimeZone('UTC'));

        $broadcastsByChannel = parent::getTimeslotBroadcast($start->format('Y-m-d H:i:s'), $end->format('Y-m-d H:i:s'), $channelsList);
        foreach ($broadcastsByChannel as &$channel) {
            foreach ($channel['broadcasts'] as &$broadcast) {
                $this->applyTimezoneOffset($broadcast);
                $this->applyIsLive($broadcast);
            }
        }

        return $broadcastsByChannel;
    }

    public function getPreviousBroadcastByProgram($programId, $channelCollection)
    {
        $broadcasts = parent::getPreviousBroadcastByProgram($programId, $channelCollection);

        foreach ($broadcasts as &$broadcast) {
            $this->applyTimezoneOffset($broadcast);
            $this->applyIsLive($broadcast);
        }

        return $broadcasts;
    }

    public function getNextBroadcastByProgram($programId, $channelCollection)
    {
        $broadcasts = parent::getNextBroadcastByProgram($programId, $channelCollection);

        foreach ($broadcasts as &$broadcast) {
            $this->applyTimezoneOffset($broadcast);
            $this->applyIsLive($broadcast);
        }

        return $broadcasts;
    }
}
