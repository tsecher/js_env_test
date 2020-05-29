<?php

include_once(__DIR__ . '/custom_autoload.php');

use BimRunner\Application\RunnerApplication;

$app = new RunnerApplication("JS Env", __DIR__, 'JsEnv', 'Actions');
$app->run();
