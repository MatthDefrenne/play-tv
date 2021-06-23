<?php

namespace PlayTv\Utils;

class Feature
{
    const ACCOUNT = 'account';
    const SALES = 'sales';
    const SOCIAL_TV = 'social_tv';
    const CATCHUP_TV = 'catchup_tv';
    const BROADCAST_HIGHLIGHTS = 'broadcast_highlights';
    const SUPPORT = 'support';
    const FAQ = 'faq';
    const TOPLIVE = 'toplive';

    private static $features = [];

    public static function activate($feature)
    {
        self::$features[$feature] = true;
    }

    public static function isActive($feature)
    {
        return isset(self::$features[$feature]) && self::$features[$feature];
    }
}
