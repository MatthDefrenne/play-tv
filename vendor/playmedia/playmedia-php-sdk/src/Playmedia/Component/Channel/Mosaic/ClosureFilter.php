<?php

namespace Playmedia\Component\Channel\Mosaic;

class ClosureFilter implements FilterInterface
{
    private $closure;

    public function __construct(\Closure $closure)
    {
        $this->closure = $closure;
    }

    public function filter(array $channel)
    {
        $closure = $this->closure;

        return $closure($channel);
    }
}
