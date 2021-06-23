<?php

namespace PlayTv\Utils;

use PlayTv\Core\Mosaic\MosaicInterface;

class ReplayTv
{
    /**
     * Generate correct html depending on channel.
     */
    public static function embed($params)
    {
        if (!isset($params['channel']) || !isset($params['params'])) {
            return false;
        }

        if (!isset($params['width'])) {
            $params['width'] = '610';
        }

        if (!isset($params['height'])) {
            $params['height'] = '384';
        }

        $wat = '<iframe width="'.$params['width'].'" height="'.$params['height'].'" src="http://www.wat.tv/embedframe/'.$params['params'].'" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>';
        $youtube = '<iframe width="'.$params['width'].'" height="'.$params['height'].'" src="http://www.youtube.com/embed/'.$params['params'].'" frameborder="0" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>';
        $dailymotion = sprintf('<iframe frameborder="0" width="%s" height="%s" src="//www.dailymotion.com/embed/video/%s" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>', 610, 343, $params['params']);

        switch ($params['channel']) {
            case 'youtube':
            case 'kto':
            case 'alsace-20':
            case 'canal-32':
            case 'clermont-premiere':
            case 'grand-lille-tv':
            case 'lcm':
            case 'telessonne':
            case 'tlm':
            case 'tlt':
            case 'tv77':
            case 'tv8-mont-blanc':
            case 'tv-vendee':
            case 'acitv':
            case 'idf1':
                $content = $youtube;
                break;

            case 'dailymotion':
            case 'lcp-ps':
            case 'calaisis-tv':
            case 'tlp':
            case 'tebeo':
            case 'telesud':
            case 'tvm-est-parisien':
            case 'tv-sud':
            case 'tv-tours':
            case 'votv':
            case 'i-tele':
                $content = $dailymotion;
                break;

            case 'canal-plus':
                $content = '<object type="application/x-shockwave-flash" width="'.$params['width'].'" height="'.$params['height'].'" id="canal'.$params['params'].'" name="canal'.$params['params'].'" data="http://player.canalplus.fr/embed/flash/player.swf"><param name="movie" value="http://player.canalplus.fr/embed/flash/player.swf"><param name="flashvars" value="param=cplus&videoId='.$params['params'].'"><param name="allowScriptAccess" value="always"/><param name="allowFullScreen" value="true"/><embed width="'.$params['width'].'" height="'.$params['height'].'" src="http://player.canalplus.fr/embed/flash/player.swf" id="canal'.$params['params'].'" name="canal'.$params['params'].'" flashVars="param=cplus&videoId='.$params['params'].'" allowscriptaccess="always" allowfullscreen="true" ><noembed>Veuillez installer Flash Player pour lire la vidéo</noembed></embed></object>';
                break;

            case 'd8':
                $content = '<object type="application/x-shockwave-flash" width="'.$params['width'].'" height="'.$params['height'].'" id="CanalPlayerEmbarque" name="canalPlayer" data="http://player.canalplus.fr/embed/flash/player.swf"><param name="movie" value="http://player.canalplus.fr/embed/flash/player.swf"><param name="flashvars" value="param=d8&videoId='.$params['params'].'"><param name="allowScriptAccess" value="always"/><param name="allowFullScreen" value="true"/><embed width="'.$params['width'].'" height="'.$params['height'].'" src="http://player.canalplus.fr/embed/flash/player.swf" id="CanalPlayerEmbarque" name="canalPlayer" flashVars="param=d8&videoId='.$params['params'].'" allowscriptaccess="always" allowfullscreen="true" ><noembed>Veuillez installer Flash Player pour lire la vidéo</noembed></embed></object>';
                break;

            case 'd17':
                $content = '<object type="application/x-shockwave-flash" width="'.$params['width'].'" height="'.$params['height'].'" id="CanalPlayerEmbarque" name="canalPlayer" data="http://player.canalplus.fr/embed/flash/player.swf"><param name="movie" value="http://player.canalplus.fr/embed/flash/player.swf"><param name="flashvars" value="param=d17&videoId='.$params['params'].'"><param name="allowScriptAccess" value="always"/><param name="allowFullScreen" value="true"/><embed width="'.$params['width'].'" height="'.$params['height'].'" src="http://player.canalplus.fr/embed/flash/player.swf" id="CanalPlayerEmbarque" name="canalPlayer" flashVars="param=17&videoId='.$params['params'].'" allowscriptaccess="always" allowfullscreen="true" ><noembed>Veuillez installer Flash Player pour lire la vidéo</noembed></embed></object>';
                break;

            case 'arte':
                $content = "<iframe width='{$params['width']}' scrolling='no' height='{$params['height']}' frameborder='0' src='{$params['params']}' style='transition-duration:0;transition-property:no;margin:0 auto;position:relative;display:block;background-color:#000000;'' allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>";
                break;

            case 'bfm-tv':
                $content = '<object width="'.$params['width'].'" height="'.$params['height'].'" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,47,0">
                    <param name="movie" value="http://c.brightcove.com/services/viewer/federated_f9?isVid=1&isUI=1" />
                    <param name="bgcolor" value="#FFFFFF" />
                    <param name="flashVars" value="videoId='.$params['params'].'&playerID=1027556707001" />
                    <param name="base" value="http://admin.brightcove.com" />
                    <param name="seamlesstabbing" value="false" />
                    <param name="allowFullScreen" value="true" />
                    <param name="swLiveConnect" value="true" />
                    <param name="allowScriptAccess" value="always" />
                    <embed src="http://c.brightcove.com/services/viewer/federated_f9?isVid=1&isUI=1" bgcolor="#FFFFFF" flashVars="videoId='.$params['params'].'&playerID=1027556707001" base="http://admin.brightcove.com" width="'.$params['width'].'" height="'.$params['height'].'" seamlesstabbing="false" type="application/x-shockwave-flash" allowFullScreen="true" allowScriptAccess="always" swLiveConnect="true" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"></embed>
                    </object>';
                break;

            case 'bfm-business':
                $content = '<object width="'.$params['width'].'" height="'.$params['height'].'" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,47,0">
                    <param name="movie" value="http://c.brightcove.com/services/viewer/federated_f9?isVid=1&isUI=1" />
                    <param name="bgcolor" value="#FFFFFF" />
                    <param name="flashVars" value="videoId='.$params['params'].'&playerID=1225340306001" />
                    <param name="base" value="http://admin.brightcove.com" />
                    <param name="seamlesstabbing" value="false" />
                    <param name="allowFullScreen" value="true" />
                    <param name="swLiveConnect" value="true" />
                    <param name="allowScriptAccess" value="always" />
                    <embed src="http://c.brightcove.com/services/viewer/federated_f9?isVid=1&isUI=1" bgcolor="#FFFFFF" flashVars="videoId='.$params['params'].'&playerID=1225340306001" base="http://admin.brightcove.com" width="'.$params['width'].'" height="'.$params['height'].'" seamlesstabbing="false" type="application/x-shockwave-flash" allowFullScreen="true" allowScriptAccess="always" swLiveConnect="true" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"></embed>
                    </object>';
                break;

            case 'normandie-tv':
                $content = '<iframe src="http://www.normandie-tv.com/embed/'.$params['params'].'/" width="'.$params['width'].'" height="'.$params['height'].'" frameborder="0" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>';
                break;

            case 'nasa':
                $content = '<script src="http://cdn-akm.vmixcore.com/vmixcore/js?auto_play=0&cc_default_off=1&player_name=uvp&width='.$params['width'].'&height='.$params['height'].'&t='.$params['params'].'"></script>';
                break;

            case 'lequipe-21':
                $content = '<div style="width:'.$params['width'].'px; height:'.$params['height'].'px;">
                    <object width="100%" height="100%" type="application/x-shockwave-flash" data="http://sa.kewego.com/swf/kp.swf">
                        <param name="allowfullscreen" value="true" />
                        <param name="allowscriptaccess" value="always" />
                        <param name="flashVars" value="playerKey=306eedd58f91&sig='.$params['params'].'&autostart=false" />
                        <param name="movie" value="http://sa.kewego.com/swf/kp.swf" />
                        <param name="wmode" value="opaque" />
                        <param name="SeamlessTabbing" value="false" />
                    </object>
                </div>';
                break;

            default :
                return false;
        }

        return $content;
    }

    public static function sortByLatest(array &$replays, MosaicInterface $mosaic)
    {
        $channels = array_keys($mosaic->toArray());

        usort($replays, function ($a, $b) use ($channels) {
            $posA = array_search($a['channel']['alias'], $channels);
            $posB = array_search($b['channel']['alias'], $channels);

            if ($posA === $posB) {
                $dateA = new \DateTime($a['broadcast_date']);
                $dateB = new \DateTime($b['broadcast_date']);

                return $dateA > $dateB ? -1 : 1;
            }

            return $posA < $posB ? -1 : 1;
        });
    }
}
