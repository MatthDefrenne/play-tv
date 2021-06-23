<?php

namespace PlayTv\Core\Mosaic\Filter;

use PlayTv\Core\Mosaic\MosaicInterface;

class SocialFilter extends BaseFilter
{
    private $socialChannels = [];

    /**
     * @param MosaicInterface $mosaic
     * @param array           $socialChannels
     */
    public function __construct(MosaicInterface $mosaic, array $socialChannels)
    {
        foreach ($socialChannels as $channelId) {
            $this->socialChannels[$channelId] = $channelId;
        }

        parent::__construct($mosaic);
    }

    public function accept()
    {
        $channel = $this->current();

        return isset($this->socialChannels[$channel['id']]);
    }
}
