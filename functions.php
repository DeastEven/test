<?php

require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/src/StarterSite.php';
require_once __DIR__ . '/src/GetImagesApi.php';


Timber\Timber::init();

Timber::$dirname = ['templates', 'views'];

new StarterSite();
