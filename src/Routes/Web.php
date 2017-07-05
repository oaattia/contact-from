<?php

namespace Oaattia\ContactForm\Routes;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

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
        // homepage route
        $app->get('/', function (Request $request, Response $response){
            echo "hello world";
        });

        return $app;
    }
}