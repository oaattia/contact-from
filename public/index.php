<?php

use Dotenv\Dotenv;
use Interop\Container\ContainerInterface;
use Oaattia\ContactForm\Routes\Web;
use Oaattia\ContactForm\Services\Mail\MailGun;
use Oaattia\ContactForm\Validation\ContactFormValidation;
use Slim\Views\PhpRenderer;
use Symfony\Component\Validator\Validation;

require "../vendor/autoload.php";

$dotenv = new Dotenv(realpath('..'));

$dotenv->load();


if (getenv('DEBUG')) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

$app = new \Slim\App(
    [
        'settings' => [
            'mailGunApi' => getenv('MAILGUN_API'),
        ],
        'view' => new PhpRenderer("../resources/views"),
        'contactFormValidator' => function (ContainerInterface $container) {
            $validator = Validation::createValidator();

            return new ContactFormValidation($container, $validator);
        },
        'mail' => function (ContainerInterface $container) {
            return new MailGun($container);
        },
    ]
);

$app = (new Web())->routes($app);

$app->run();