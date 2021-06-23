<?php

namespace Playmedia\Translation\Loader;

use Symfony\Component\Translation\Loader\LoaderInterface;
use Symfony\Component\Translation\Exception\NotFoundResourceException;
use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\Loader\MoFileLoader;
use Symfony\Component\Translation\Loader\PoFileLoader;

class FallbackLoader implements LoaderInterface
{
    private $moFileLoader;
    private $poFileLoader;

    public function __construct(MoFileLoader $moFileLoader, PoFileLoader $poFileLoader)
    {
        $this->moFileLoader = $moFileLoader;
        $this->poFileLoader = $poFileLoader;
    }

    /**
     * {@inheritdoc}
     *
     * @api
     */
    public function load($resource, $locale, $domain = 'messages')
    {
        try {
            return $this->moFileLoader->load(str_replace('*', 'mo', $resource), $locale, $domain);
        } catch (NotFoundResourceException $e) {
            return $this->poFileLoader->load(str_replace('*', 'po', $resource), $locale, $domain);
        }

        return new MessageCatalogue($locale);
    }
}
