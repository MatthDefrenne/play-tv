<?php

namespace Playmedia\Utils;

use Playmedia\Lib\TvBase;

class Program
{
    const PARIS_STREAM_URL_FORMAT = 'http://c.paristream.com/Yf2d7ZJw-%s.js?w=%d&amp;h=%d&amp;t=%s';
    const WE_TV_STREAM_URL_FORMAT = 'http://ios.videos.we-tv.net/79669bb7-3b24-4727-8fdb-cf84e36fca15/%s.mp4';

    public static function getFlashTrailerStream($program, $width = 488, $height = 301)
    {
        if (isset($program['trailer']['ps_id'])) {
            $psId = $program['trailer']['ps_id'];
            $streamToken = TvBase::getStreamToken($psId);

            return sprintf(self::PARIS_STREAM_URL_FORMAT, $psId, $width, $height, $streamToken);
        }

        return;
    }

    public static function getHtml5TrailerStream($program)
    {
        if (isset($program['trailer']['id'])) {
            return sprintf(self::WE_TV_STREAM_URL_FORMAT, $program['trailer']['id']);
        }

        return;
    }

    public function summaryFormatted($string)
    {
        $lower = 'a-zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ';
        $upper = 'A-ZÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝ';
        $w = "a-zA-ZàáâãäåçèéêëìíîïðòóôõöùúûüýÿÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝ\x27";

        // virtual paragraphs
        $string = trim($string);
        if (preg_match("#[^.;!?]\s*$#u", $string) === 1) {
            $string .= '.';
        }

        $regex[] = '#\s+(!|\?|\.\.\.|\x85)$#u';
        $replace[] = '$1';
        $regex[] = "# *\r+\n+ *#";
        $replace[] = '</p><p>';
        $regex[] = "#[\n\r]#";
        $replace[] = '<br>';
        $regex[] = "#[\t ]+#";
        $replace[] = ' ';
        $regex[] = "#([^.?!]{100,})(?<!<span>|<strong>|\.|\?|!)(?:([\.?!]+)\s*)(?!\)|\.|\?|!|\"|»)(?=[{$upper}0-9])#u";
        $replace[] = '$1$2</p><p>';

        $string = '<p>'.preg_replace($regex, $replace, $string).'</p>';

        return preg_replace("#<p>\s*</p>#u", '', $string);
    }
}
