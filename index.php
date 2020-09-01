<?php

require __DIR__ . '/src/config.php';
require __DIR__ . '/vendor/autoload.php';

use App\App;

$app = new App();
$app->run();