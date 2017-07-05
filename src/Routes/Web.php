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
        $app->get(
            '/',
            function (Request $request, Response $response) {
                return $this->view->render($response, 'form.phtml');
            }
        )->setName("homepage");

        $app->post(
            '/send',
            function (Request $request, Response $response) {
                $violationsArray = $this->contactFormValidator->handle();

                $url = $this->router->pathFor('homepage', ['violationsArray' => $violationsArray]);

                return $response->withStatus(302)->withHeader('Location', $url);
            }
        );


        return $app;
    }
}