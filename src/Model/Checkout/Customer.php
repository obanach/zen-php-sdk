<?php

namespace Zen\Model\Checkout;

class Customer {

    private string $firstName;
    private string $lastName;
    private string $email;

    public function __construct($firstName, $lastName, $email){
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