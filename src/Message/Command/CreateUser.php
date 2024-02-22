<?php

namespace App\Message\Command;

final class CreateUser
{
    /*
     * Add whatever properties and methods you need
     * to hold the data for this message class.
     */

    private $firstName;
    private $lastName;
    private $email;

    public function __construct(string $firstName, string $lastName, string $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    
}
