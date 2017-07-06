<?php

namespace Oaattia\ContactForm\Controller;

use Interop\Container\ContainerInterface;

class ContactFormController
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * ContactFormController constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Home Action
     *
     * @param $request
     * @param $response
     * @return view
     */
    public function getHome($request, $response)
    {
        return $this->container->view->render($response, 'form.phtml');
    }


    public function postContact($request, $response)
    {
        if(!$request->isXhr()) {
            return $response->withStatus(302)->withHeader('Location', '/');
        }

        $violationsArray = $this->container->contactFormValidator->handle($request->getParsedBody());
var_dump($violationsArray);die();
//        $this->container->mailSender->send(
//            'oaattia@live.com',
//            getenv("CONTACT_EMAIL"),
//            'subject important',
//            'some cool message'
//        );

        $url = $this->container->router->pathFor('homepage', ['violationsArray' => $violationsArray]);

        return $response->withStatus(302)->withHeader('Location', $url);
    }
}