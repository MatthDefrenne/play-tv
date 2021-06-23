<?php

namespace PlayTv\Sitemap\Builder\Channel;

use PlayTv\Sitemap\Builder\Channel;

class Live extends Channel
{
    protected function getBasename()
    {
        return 'channels-live';
    }

    protected function getChangeFrequency()
    {
        return 'hourly';
    }
}
