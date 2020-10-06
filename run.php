<?php

include_once(__DIR__ . '/custom_autoload.php');

use BimRunner\Application\RunnerApplication;
use BimRunner\Tools\Tools\ProjectTools;
use Symfony\Component\Console\Input\InputArgument;

$app = new RunnerApplication("create", __DIR__, 'JsEnv', 'Actions');
$app->getCommand()->addArgument(ProjectTools::PROP_PROJECT_NAME, InputArgument::OPTIONAL, 'Nom du projet' );
$app->run();
