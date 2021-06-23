<?php

namespace PlayTv\Sitemap\Builder\Channel;

use PlayTv\Sitemap\Builder\Channel;

class Broadcast extends Channel
{
    protected function getBasename()
    {
        return 'channels-broadcast';
    }

    protected function getChangeFrequency()
    {
        return 'daily';
    }
}
