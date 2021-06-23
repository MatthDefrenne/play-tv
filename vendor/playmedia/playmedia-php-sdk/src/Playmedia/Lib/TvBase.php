<?php

namespace Playmedia\Lib;

/**
 * TvBase utility class to provide secure trailers.
 *
 * @author David Guyon <d.guyon@playmedia.fr>
 */
class TvBase
{
    const API_KEY = '5B25D1EE-1507-4559-8E73-1A724F51E253';
    const API_SECRET = 'bCoDhz0I6fOAy4dHhJin30ZNIYxvQrSz6y1U4etqtqk6Imypn5OnWpindkgL3hjNKiFrxJIQgvjaGbWMmVgwAuEnr9Khpr4AXyofJ81tQWO1AtvK4CPSDpjuUTBq5I9Mb5RTxlKXrXrHKLcRFJpx8vyQ6RSfaYKd1JWECSH6ckpGmrlewtU5rigrXC2BJOYNdchLCqOH';

    /**
     * Get a signed stream token from a media_id.
     *
     * @param string $media_id
     * @param string $token_separator
     * @param string $media_type_separator
     *
     * @return string
     */
    public static function getStreamToken($media_id, $token_separator = '|', $media_type_separator = ',')
    {
        $unsigned_token = str_replace('-', '', self::API_KEY);
        $unsigned_token .= $token_separator;
        $unsigned_token .= $media_id.$media_type_separator.'v';
        $unsigned_token .= $token_separator;
        $unsigned_token .= time();
        $unsigned_token .= $token_separator;
        $unsigned_token .= rand(10000000, 99999999);

        $signed_token = self::sign($unsigned_token);
        $signed_token = str_replace('-', '', $signed_token);
        $signed_token = strtolower($signed_token);

        $stream_token = sprintf('%s%s%s', $unsigned_token, $token_separator, $signed_token);

        return $stream_token;
    }

    /**
     * Sign a string.
     *
     * @param [type] $str [description]
     *
     * @return [type] [description]
     */
    protected static function sign($str)
    {
        $signature = sha1($str.self::API_SECRET);

        return $signature;
    }
}
