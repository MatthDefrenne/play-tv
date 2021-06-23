<?php

namespace PlayTv\Core\Mosaic\Filter;

use Playmedia\Component\Channel as ChannelComponent;

class TntFilter extends BaseFilter
{
    public function accept()
    {
        return ChannelComponent::isTnt($this->current());
    }
}
