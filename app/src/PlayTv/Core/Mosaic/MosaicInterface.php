<?php

namespace PlayTv\Core\Mosaic;

interface MosaicInterface extends \Traversable, \ArrayAccess, \Countable
{
    public function toArray();
}
