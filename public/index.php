<?php

use Oaattia\ContactForm\Routes\Web;

error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../vendor/autoload.php";

$app = new \Slim\App();

$app = (new Web())->routes($app);

$app->run();