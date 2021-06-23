<?php

namespace PlayTv\Sitemap;

class SitemapIndex
{
    private $xml;

    public function __construct()
    {
        $this->xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"/>');
    }

    public function add($loc, \DateTime $lastmod = null)
    {
        if (null === $lastmod) {
            $lastmod = new \DateTime();
        }

        $timezone = new \DateTimeZone('UTC');
        $lastmod->setTimezone($timezone);

        $sitemap = $this->xml->addChild('sitemap');
        $sitemap->addChild('loc', $loc);
        $sitemap->addChild('lastmod', $lastmod->format(\DateTime::W3C));
    }

    public function __toString()
    {
        $dom = new \DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($this->xml->asXML());

        return $dom->saveXML();
    }

    public function write($filename)
    {
        $this->xml->asXML($filename);
    }
}
