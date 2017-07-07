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


    /**
     * Process the form
     *
     * @param $request
     * @param $response
     * @return mixed
     */
    public function postContact($request, $response)
    {
        if (!$request->isXhr()) {
            return $response->withStatus(302)->withHeader('Location', '/');
        }

        $violationsArray = $this->container->contactFormValidator->handle($request->getParsedBody());

        if (!empty($violationsArray)) {
            return $response->withJson($violationsArray, 400);
        }

        $this->container->mailSender->send(
            $email = $request->getParam('form')[1]['value'],
            getenv("CONTACT_EMAIL"),
            $name = $request->getParam('form')[0]['value'],
            $message = $request->getParam('form')[2]['value']
        );

        $this->container->database->insert(
            $name,
            $email,
            $message
        );

    }
}