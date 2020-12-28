<?php

namespace App\service;

use Symfony\Component\Mime\Email;

interface MailerInterface
{
    public function sent(Email $email): void;
}
