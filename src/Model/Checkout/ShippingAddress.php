<?php

namespace Zen\Model\Checkout;

class ShippingAddress {

    private ?string $id;
    private ?string $firstName;
    private ?string $lastName;
    private ?string $country;


    public function __construct(?string $id = null, ?string $firstName = null, ?string $lastName = null, ?string $country = null) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->country = $country;
    }

    public function getId(): ?string {
        return $this->id;
    }

    public function setId(?string $id): void {
        $this->id = $id;
    }

    public function getFirstName(): ?string {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): void {
        $this->firstName = $firstName;
    }

    public function getLastName(): ?string {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): void {
        $this->lastName = $lastName;
    }

    public function getCountry(): ?string {
        return $this->country;
    }

    public function setCountry(?string $country): void {
        $this->country = $country;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'country' => $this->country,
        ];
    }

}