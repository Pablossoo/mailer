<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class EmailDTO
{
    /** @Assert\Email() */
    public string $email;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=3)
     */
    public string $name;
    /** @Assert\NotBlank() */
    public string $message;
}
