<?php

namespace Oaattia\ContactForm;

use Interop\Container\ContainerInterface;
use Oaattia\ContactForm\Controller\ContactFormController;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\MessageInterface;
use Slim\Http\Request;
use Slim\Http\Response;


class ContactFormControllerTest extends TestCase
{
    private $response;
    private $request;
    private $container;

    public function tearDown()
    {
        \Mockery::close();
    }

    public function setUp()
    {
        $this->container = \Mockery::mock(ContainerInterface::class);
        $this->request = \Mockery::mock(Request::class);
        $this->response = \Mockery::mock(Response::class);
    }

    public function test_if_not_ajax_redirect()
    {
        $this->request->shouldReceive('isXhr')->times(1)->andReturn(false);
        $this->response->shouldReceive('withStatus->withHeader')->once();
        $this->container->shouldNotReceive('contactFormValidator->handle');

        $contactForm = new ContactFormController($this->container);
        $this->assertEquals(null, $contactForm->postContact($this->request, $this->response));
    }

//    public function test_if_there_is_errors_response_with_json()
//    {
        //TODO: need to be done
//        $this->request->shouldReceive('isXhr')->times(1)->andReturn(true);
//        $this->container->shouldReceive('get->handle')->with($this->request->shouldReceive('getParsedBody')->once()->andReturn([]))->andReturn([]);

//        $contactForm = new ContactFormController($this->container);
//        $this->assertEquals(null, $contactForm->postContact($this->request, $this->response));
//    }
}
