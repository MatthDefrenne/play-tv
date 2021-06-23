<?php

namespace PlayTv\Live\Parameters\Lifecycle;

/**
 * Progress parameters.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
class Progress implements \JsonSerializable
{
    protected $broadcast = [];

    /**
     * setBroadcast.
     *
     * @param mixed $broadcast
     *
     * @TODO patch Sdk instead
     */
    public function setBroadcast($broadcast)
    {
        if (null !== $broadcast) {
            $this->broadcast = $broadcast;
        }

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'progress' => (!isset($this->broadcast['progress'])) ? '' : round($this->broadcast['progress']),
            'startAt' => (!isset($this->broadcast['start']) ? '' : date('H:i', strtotime($this->broadcast['start']))),
            'endAt' => (!isset($this->broadcast['end']) ? '' : date('H:i', strtotime($this->broadcast['end']))),
            'program' => [
                'title' => (!isset($this->broadcast['program']['fulltitle']) ? '' : $this->broadcast['program']['fulltitle']),
                'genre' => (!isset($this->broadcast['program']['gender'])) ? '' : $this->broadcast['program']['gender'],
                'subgenre' => (!isset($this->broadcast['program']['subgender'])) ? '' : $this->broadcast['program']['subgender'],
            ],
        ];
    }
}
