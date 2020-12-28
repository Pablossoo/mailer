<?php

namespace App\Tests\Service;

use App\service\Mailer;
use PHPUnit\Framework\TestCase;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class MailerTest extends TestCase
{
    public function testSentMailSuccess()
    {
        $email = new TemplatedEmail();
        $email->from('test@gmail.com')
            ->to('test@gmail.com')
            ->subject('testowa wiadomosc');

        $mockMailerSymfony = $this->getMockBuilder(MailerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockMailerSymfony->expects($this->once())
            ->method('send');

        $mailer = new Mailer($mockMailerSymfony);
        $mailer->sent($email);
    }
}
