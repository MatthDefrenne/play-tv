<?php

namespace Playmedia\Component\Channel\Mosaic;

interface FilterInterface
{
    /**
     * @param array $channel
     *
     * @return bool
     */
    public function filter(array $channel);
}
