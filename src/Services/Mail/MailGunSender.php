<?php

namespace Oaattia\ContactForm\Services\Mail;

use Interop\Container\ContainerInterface;
use Mailgun\Mailgun;

class MailGunSender implements Mail
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var Mailgun
     */
    private $mailGun;

    /**
     * MailGun constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->mailGun = Mailgun::create($this->container->settings->mailGunApi);
    }

    public function send()
    {

        $this->mailGun->send();

    }


}