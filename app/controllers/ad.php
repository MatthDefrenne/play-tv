<?php

/**
 *  Controller ad.
 *  Iframable.
 */
class ad_controller extends ppl_app_controller
{
    public function before_action()
    {
        parent::before_action();

        $this->robots(false);
    }

    public function television_action()
    {
        return $this->render();
    }

    public function taboola_action()
    {
        $html =
 <<<_
<!DOCTYPE html>
<html>
<head>
    <title>Taboola</title>
    <script src="https://cdn.taboola.com/libtrc/playtv/loader.js"></script>
</head>
<body>
    <div id="taboola-live-video-desktop" class="pmd-js-AdsTaboola pmd-AdsTaboola"></div>
    <script>
        window._taboola = window._taboola || []
        _taboola.push({video:'auto'})
        _taboola.push({
          mode: 'thumbnails-dskvid',
          container: 'taboola-live-video-desktop',
          placement: 'Live Video Desktop',
          target_type: 'mix'
        })
        _taboola.push({flush: true})
    </script>
</body>
</html>
_;

        $this->response->write($html);
    }
}
