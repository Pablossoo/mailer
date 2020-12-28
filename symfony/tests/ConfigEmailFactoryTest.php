<?php

namespace App\Tests;

use App\Dto\EmailDTO;
use App\Factory\ConfigEmailFactory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Mime\Email;

class ConfigEmailFactoryTest extends TestCase
{
    public function testCreateEmailTemplate()
    {
        $emailDto = new EmailDTO();
        $emailDto->email = 'test@gmail.com';
        $emailDto->message = 'testowa wiadomosc';
        $emailDto->name = 'Jan Nowak';

        $configEmailFactory = new ConfigEmailFactory();
        $config = $configEmailFactory->createConfigEmail($emailDto, 'test@gmail.com');

        $this->assertInstanceOf(Email::class, $config);
    }
}
