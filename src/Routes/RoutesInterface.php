<?php

namespace Oaattia\ContactForm\Routes;

use Slim\App;

interface RoutesInterface
{
    /**
     * Create the routes
     *
     * @param App $app
     * @return App
     */
    public function routes(App $app) : App;
}