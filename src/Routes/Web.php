<?php

namespace Oaattia\ContactForm\Routes;

use Oaattia\ContactForm\Controller\ContactFormController;
use Slim\App;

class Web implements RoutesInterface
{
    /**
     * Create the routes for web
     *
     * @param App $app
     * @return App
     */
    public function routes(App $app) : App
    {
        $app->get(
            '/',
            ContactFormController::class.':getHome'
        )->setName('homepage');

        $app->post(
            '/send',
            ContactFormController::class.':postContact'
        )->setName('process-contact');

        return $app;
    }
}