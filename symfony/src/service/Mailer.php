<?php

namespace App\service;

use Symfony\Component\Mime\Email;

class Mailer implements MailerInterface
{
    private \Symfony\Component\Mailer\MailerInterface $mailer;

    public function __construct(\Symfony\Component\Mailer\MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sent(Email $email): void
    {
        $this->mailer->send($email);
    }
}
