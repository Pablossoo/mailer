<?php

namespace App\Factory;

use App\Dto\EmailDTO;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

class ConfigEmailFactory
{
    public function createConfigEmail(EmailDTO $email, string $receiver): Email
    {
        return (new TemplatedEmail())

            ->from(new Address($email->email, $email->name))
            ->to(new Address($receiver))
            ->subject('Najnowsze promocje')
            ->htmlTemplate('email/email_template.html.twig')
            ->context([
                'message' => $email->message,
            ]);
    }
}
