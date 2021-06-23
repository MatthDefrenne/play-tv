<?php

namespace PlayTv\Live\Parameters\Lifecycle;

/**
 * Playlist parameters.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
class Playlist implements \JsonSerializable
{
    public $data = [];
    protected $streams = [];
    protected $language;
    private $ptvFormats = ['flash', 'rtsp', 'hds', 'dash', 'hls'];

    public function __construct(array $streams, $locale)
    {
        $this->streams = $this->formatStreams($streams);
        $this->language = $this->getLanguageFromLocale($locale);
    }

    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    public function jsonSerialize()
    {
        $playlist = [
            'streams' => $this->streams,
        ];

        if (count($this->data > 0)) {
            $playlist = array_merge($this->data, $playlist);
        }

        return $playlist;
    }

    /**
     * Get language from locale allowing us to order streams by languages.
     *
     * @see http://php.net/manual/fr/locale.getprimarylanguage.php
     *
     * @param string $locale
     *
     * @return string
     */
    protected function getLanguageFromLocale($locale)
    {
        return \Locale::getPrimaryLanguage($locale);
    }

    /**
     * Streams formatter.
     * Respect order priority between bitrate and languages.
     *
     * @param array $streams
     *
     * @return array
     */
    protected function formatStreams(array $streams)
    {
        if (empty($streams)) {
            return [];
        }

        $list = [];

        // Order streams by bitrate desc
        usort($streams, function ($a, $b) {
            if ($a['bitrate'] === $b['bitrate']) {
                return 0;
            }

            return $a['bitrate'] < $b['bitrate'];
        });

        foreach ($streams as $stream) {
            $language = strtolower($stream['languageCode']);
            $format = $stream['format'];

            $item = [
                'label' => $this->formatBitrate($stream['bitrate']),
                'value' => $stream['bitrate'],
            ];

            if ('ptv' == $format) {
                foreach ($this->ptvFormats as $format) {
                    $list[$language][$format]['bitrates'][] = $item;
                }
            } else {
                $list[$language][$format]['bitrates'][] = $item;
            }
        }

        // Set adaptive streaming as default for HLS, first for others
        foreach ($list as $language => $streams) {
            foreach ($streams as $format => $item) {
                if ('hls' === $format) {
                    $list[$language][$format]['bitrates'][] = [
                        'label' => 'Auto',
                        'value' => 0,
                        'default' => true,
                    ];
                } else {
                    $list[$language][$format]['bitrates'][0]['default'] = true;
                }
            }
        }

        // Sort streams so that the user's language appears first
        $language = $this->language;
        uksort($list, function ($a, $b) use ($language) {
            if ($a == $language) {
                return -1;
            }
            if ($b == $language) {
                return 1;
            }

            return strcmp($a, $b);
        });

        return $list;
    }

    private function formatBitrate($bitrate)
    {
        return ($bitrate / 1000).' Mbps';
    }
}
