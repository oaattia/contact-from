<?php

use Dotenv\Dotenv;
use Interop\Container\ContainerInterface;
use Oaattia\ContactForm\Controller\ContactFormController;
use Oaattia\ContactForm\Routes\Web;
use Oaattia\ContactForm\Services\Mail\MailGunSender;
use Oaattia\ContactForm\Validation\ContactFormValidation;
use Slim\Views\PhpRenderer;
use Symfony\Component\Validator\Validation;

require "../vendor/autoload.php";

$dotenv = new Dotenv(realpath('..'));
$dotenv->load();

$app = new \Slim\App(
    [
        'settings' => [
            'mailGunApi' => getenv('MAILGUN_API'),
            'domainName' => getenv('DOMAINNAME'),
            'displayErrorDetails' => getenv('DEBUG') ?? false
        ],
        'view' => new PhpRenderer("../resources/views"),
        'contactFormValidator' => function (ContainerInterface $container) {
            $validator = Validation::createValidator();
            return new ContactFormValidation($container, $validator);
        },
        'mailSender' => function (ContainerInterface $container) {
            return new MailGunSender($container);
        },
        'ContractFormController' => function(ContainerInterface $container) {
            return new ContactFormController($container);
        }
    ]
);

$app = (new Web())->routes($app);
$app->run();