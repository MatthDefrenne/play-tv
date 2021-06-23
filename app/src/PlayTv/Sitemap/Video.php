<?php

namespace PlayTv\Sitemap;

// Simple Google Video Sitemap helper class
// See: https://support.google.com/webmasters/answer/80471
class Video
{
    const XML_NS = 'http://www.google.com/schemas/sitemap-video/1.1';

    private $scheme;
    private $channel;

    public function __construct(array $channel, $scheme = 'http')
    {
        $this->channel = $channel;     // Channel array item
        $this->scheme = $scheme.'://'; // 'http(s)://'
    }

    protected function title($name)
    {
        // Known issue : this is an ugly hack
        return htmlspecialchars(sprintf(
            'Regarder %s en direct sur internet - Play TV',
            $name
        ));
    }

    protected function description($name)
    {
        // Known issue : this is an ugly hack
        return htmlspecialchars(sprintf(
            'Regarder le direct télé de la chaîne %s gratuitement sur le web avec playtv.fr, votre plateforme de tv en live.',
            $name
        ));
    }

    protected function publicationDate($dateStr)
    {
        try {
            $date = \DateTime::createFromFormat('Y-m-d H:i:s', $dateStr);
            $date = $date->format('Y-m-d');
        } catch (\Exception $e) {
            $date = null;
        }

        return $date;
    }

    public function addTo($xmlElement)
    {
        $video = $xmlElement->addChild('video:video', null, self::XML_NS);
        $video->addChild('video:thumbnail_loc', $this->channel['images']['large'], self::XML_NS); // 16:9 "large" channel image
        $video->addChild('video:title', $this->title($this->channel['name']), self::XML_NS);
        $video->addChild('video:description', $this->description($this->channel['name']), self::XML_NS);
        $video->addChild('video:player_loc', $this->channel['player_url'], self::XML_NS); // "player_url" property is added by sitemap builder

        $date = $this->publicationDate($this->channel['created_at']);
        if ($date) {
            $video->addChild('video:publication_date', $date, self::XML_NS);
        }

        $video->addChild('video:family_friendly', $this->channel['is_adult'] ? 'no' : 'yes', self::XML_NS);
        $video->addChild('video:live', 'yes', self::XML_NS);

        if (! empty($this->channel['theme_name'])) {
            $video->addChild('video:category', htmlspecialchars($this->channel['theme_name']), self::XML_NS);
        }

        return $xmlElement;
    }
}
