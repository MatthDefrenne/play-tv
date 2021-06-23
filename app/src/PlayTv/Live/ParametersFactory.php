<?php

namespace PlayTv\Live;

/**
 * Parameters builder.
 *
 * Factory method to build typed parameters.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
class ParametersFactory
{
    public $baseUrl;
    public $assetsBaseUrl;
    public $locale;
    public $isMobile;
    public $isI18n;

    protected $map = [
        'player' => 'PlayTv\\Live\\Parameters\\Player',
        'externalIframe' => 'PlayTv\\Live\\Parameters\\ExternalIframe',
        'progress' => 'PlayTv\\Live\\Parameters\\Lifecycle\\Progress',
        'playlist' => 'PlayTv\\Live\\Parameters\\Lifecycle\\Playlist',
    ];

    public function __construct($baseUrl, $assetsBaseUrl, $locale, $isMobile, $isI18n)
    {
        $this->baseUrl = $baseUrl;
        $this->assetsBaseUrl = $assetsBaseUrl;
        $this->locale = $locale;
        $this->isMobile = $isMobile;
        $this->isI18n = $isI18n;
    }

    public function get($className, $options = [])
    {
        $fqns = $this->map[$className];
        $callbackFunction = 'callback'.ucfirst($className);

        return $this->$callbackFunction($fqns, $options);
    }

    protected function callbackPlayer($fqns, $options)
    {
        $parameters = new $fqns($this->baseUrl, $this->assetsBaseUrl, $this->locale);

        if (!isset($options['channel'])) {
            throw new \Exception('Missing mandatory arguments channel');
        }
        $parameters->setChannel($options['channel']);

        $mode = 'default';
        if (isset($options['mode'])) {
            $mode = $options['mode'];
        }

        switch ($mode) {
            case 'embeddable':
                $parameters
                    ->disableSkipAds()
                    ->enableChannelLogo()
                    ->enableWhiteLabel()
                    ->disableSales()
                    ->disableSwitchHd()
                ;

                if ($this->isMobile) {
                    $parameters
                        ->setAutoplay(false)
                        ->setMobileOnePrerollAds()
                        ->disableVolume()
                        ->disableBitrate()
                        ->disableExport()
                        ->disableFacebook()
                        ->disableTwitter()
                    ;
                }
                break;

            case 'default':
                $parameters
                    ->enablePopup()
                ;

                if ($this->isMobile) {
                    $parameters
                        ->setAutoplay(false)
                        ->disableSkipAds()
                        ->setMobileOnePrerollAds()
                        ->disablePopup()
                        ->disableSwitchHd()
                        ->disableSales()
                        ->disableVolume()
                        ->disableBitrate()
                        ->disableExport()
                        ->disableFacebook()
                        ->disableTwitter()
                    ;
                }

                // Should be remove when app is fully translated
                if ($this->isI18n) {
                    $parameters
                        ->disableSkipAds()
                        ->disableSwitchHd()
                        ->disableSales()
                    ;
                }
                break;

            default:
                throw new \InvalidArgumentException('Unexpected mode value "{$mode}"');
                break;
        }

        return $parameters;
    }

    protected function callbackExternalIframe($fqns, $options)
    {
        $parameters = new $fqns($this->baseUrl, $this->assetsBaseUrl, $this->locale);

        if (!isset($options['channel'])) {
            throw new \Exception('Missing mandatory arguments channel');
        }
        $parameters->setChannel($options['channel']);

        return $parameters;
    }

    protected function callbackProgress($fqns, $options)
    {
        $parameters = new $fqns();

        if (isset($options['broadcast'])) {
            $parameters->setBroadcast($options['broadcast']);
        }

        return $parameters;
    }

    protected function callbackPlaylist($fqns, $options)
    {
        if (!isset($options['streams'])) {
            throw new \Exception('Missing mandatory arguments streams');
        }
        $parameters = new $fqns($options['streams'], $this->locale);

        // @TODO
        // additional keys to be deprecated soon with migrating to player parameters instead
        $products = [];
        $account = null;
        $hasHd = false;

        if (!isset($options['channel'])) {
            throw new \Exception('Missing mandatory arguments channel');
        }
        if (isset($options['products'])) {
            $products = $options['products'];
        }
        if (isset($options['account'])) {
            $account = $options['account'];
        }

        if (null !== $account && count($products) > 0) {
            foreach ($products as $product) {
                if (true === $account->isSubscribedTo($product['alias'])) {
                    $hasHd = true;

                    break;
                }
            }
        }
        $data = [];
        $data['hasHd'] = $hasHd;
        $data['id'] = $options['channel']['id'];
        $data['imageUrl'] = $options['channel']['images']['medium'];
        $data['productsUrl'] = '/nos-offres/';
        $data['products'] = [];
        if (count($products) > 0) {
            foreach ($products as $product) {
                $data['products'][] = [
                    'alias' => $product['alias'],
                    'label' => $product['name'],
                    'price' => $product['price'] / 100,
                    'url' => "/nos-offres/{$product['alias']}/",
                ];
            }
        }
        $parameters->setData($data);

        return $parameters;
    }
}
