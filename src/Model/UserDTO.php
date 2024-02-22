<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class UserDTO
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $firstName,

        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $lastName,

        #[Assert\NotBlank]
        #[Assert\Type('string')]
        public string $email,
    ) {
    }
}