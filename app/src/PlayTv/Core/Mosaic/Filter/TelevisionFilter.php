<?php

namespace PlayTv\Core\Mosaic\Filter;

use PlayTv\Core\Mosaic\MosaicInterface;
use PlayTv\Core\Mosaic\Decorator\StreamingDecorator;

class TelevisionFilter extends BaseFilter
{
    private $country;
    private $account;
    private $options = [];

    /**
     * @param MosaicInterface $mosaic
     * @param array           $options
     */
    public function __construct(MosaicInterface $mosaic, array $options = array())
    {
        $this->setOptions($options);

        parent::__construct($mosaic);
    }

    public function getOption($name)
    {
        return isset($this->options[$name]) ? $this->options[$name] : null;
    }

    public function setOptions(array $options)
    {
        $defaults = array(
            'with_external_streams' => false,
            'with_exclusive_channels' => true,
        );

        $this->options = array_merge($defaults, $options);

        return $this;
    }

    public function accept()
    {
        $channel = $this->current();

        if (!StreamingDecorator::streamingKeysAreDefined($channel)) {
            throw new \BadMethodCallException('Streaming keys are not defined. Make sure to use a StreamingDecorator.');
        }

        if (!$channel['streamable']) {
            return false;
        }

        if ('external' === $channel['streaming_source'] && !$this->getOption('with_external_streams')) {
            return false;
        }

        if ('internal' === $channel['streaming_source'] && !$channel['stream_access']['account'] && !$this->getOption('with_exclusive_channels')) {
            return false;
        }

        return true;
    }
}
