<?php

namespace PlayTv\Core\Mosaic\Decorator;

use Playmedia\Component\Channel\ProductResolver;
use PlayTv\Core\Mosaic\MosaicInterface;
use PlayTv\Utils\Channel as ChannelUtils;

class TelevisionDecorator extends BaseDecorator
{
    private $productResolver;

    public function __construct(MosaicInterface $mosaic, ProductResolver $productResolver)
    {
        $this->productResolver = $productResolver;

        parent::__construct($mosaic);
    }

    public function current()
    {
        $channel = parent::current();

        if (!StreamingDecorator::streamingKeysAreDefined($channel)) {
            throw new \BadMethodCallException('Streaming keys are not defined. Make sure to use a StreamingDecorator.');
        }

        // Disabled state
        $channel['disabled'] = ('external' === $channel['streaming_source'] && 'website' === $channel['streaming_spec']);

        // // Highlight flag
        // //
        // // - retail or exclusive channels
        // // - thematic pack not in both freemium and premium pack
        // // - internal stream source only
        $products = array_map(function ($product) {
            return $product['alias'];
        }, $channel['products']);

        $is_freemium_or_premium = in_array('pack-premium', $products) && in_array('pack-decouverte', $products);

        $channel['highlight'] = !$is_freemium_or_premium && 'internal' === $channel['streaming_source'];

        // Skip ads alias
        $picked_product = $this->productResolver->pickProduct($channel);
        $channel['skip_ads'] = $picked_product['alias'];

        $channel['is_radio'] = ChannelUtils::isRadio($channel);

        return $channel;
    }
}
