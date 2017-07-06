<?php

namespace Oaattia\ContactForm\Services\Mail;


interface MailSender
{
    /**
     * @param string $from
     * @param string $to
     * @param string $subject
     * @param string $message
     * @return Response
     */
    public function send($from, $to, $subject, $message);
}