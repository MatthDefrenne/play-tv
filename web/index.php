<?php

umask(0000);

require __DIR__.'/../vendor/autoload.php';

$application = new PlayTv\Application('play-tv', __DIR__.'/../', false, getenv('APP_ENV') !== 'production' ? 3 : 1);
$application->run();
