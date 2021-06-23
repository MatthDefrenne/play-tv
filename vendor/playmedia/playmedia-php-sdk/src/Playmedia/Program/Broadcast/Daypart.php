<?php

namespace Playmedia\Program\Broadcast;

class Daypart
{
    private $name;
    private $start;
    private $end;

    public function __construct($name, \DateTimeInterface $start, \DateTimeInterface $end)
    {
        $this->name = $name;
        $this->start = $start;
        $this->end = $end;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function __toString()
    {
        return $this->name;
    }
}
