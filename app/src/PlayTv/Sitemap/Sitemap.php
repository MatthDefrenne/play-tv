<?php

namespace PlayTv\Sitemap;

class Sitemap implements \Countable
{
    private $domain;
    private $xml;
    private $count = 0;
    private $scheme;

    const MAX_URL_COUNT = 50000;

    const CHANGEFREQ_ALWAYS = 'always';
    const CHANGEFREQ_HOURLY = 'hourly';
    const CHANGEFREQ_DAILY = 'daily';
    const CHANGEFREQ_WEEKLY = 'weekly';
    const CHANGEFREQ_MONTHLY = 'monthly';
    const CHANGEFREQ_YEARLY = 'yearly';
    const CHANGEFREQ_NEVER = 'never';

    public function __construct($domain, $scheme = 'http', $withVideoNamespace = false)
    {
        $this->scheme = $scheme.'://'; // 'http(s)://'
        $this->domain = $domain;

        // FIXME: better way to add urlset element with namespace attributes
        if ($withVideoNamespace) {
            $this->xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:video="'.Video::XML_NS.'"/>');
        } else {
            $this->xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"/>');
        }
    }

    public function count()
    {
        return $this->count;
    }

    public function add($loc, $changefreq = null, \DateTime $lastmod = null, $priority = null, $video = null)
    {
        if (0 !== strpos($loc, $this->scheme)) {
            $loc = $this->scheme.$this->domain.$loc;
        }

        $url = $this->xml->addChild('url');
        $url->addChild('loc', $loc);

        // Check if Google video sitemap element must be embeded to url element
        if ($video) {
            $url = $video->addTo($url);
        }

        if (!empty($changefreq)) {
            $url->addChild('changefreq', $changefreq);
        }

        ++$this->count;
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
