<?php

namespace Oaattia\ContactForm\Services\Mail;

use Interop\Container\ContainerInterface;
use Mailgun\Mailgun;

class MailGunSender implements MailSender
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
        $this->mailGun = Mailgun::create($this->container->settings['mailGunApi']);
    }

    /**
     * @param string $from
     * @param string $to
     * @param string $subject
     * @param string $message
     * @return \Mailgun\Model\Message\SendResponse
     */
    public function send($from, $to, $subject, $message)
    {
        $parameters = [
            'from'    => $from,
            'to'      => $to,
            'subject' => $subject,
            'text'    => $message
        ];

        return $this
            ->mailGun
            ->messages()
            ->send($this->container->settings['domainName'], $parameters);
    }


}