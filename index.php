<?php
use Mealoclock\Application as App;

session_start();

require_once 'vendor/autoload.php';

$app = new App();
$app->run();
