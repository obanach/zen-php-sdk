<?php

namespace Zen\Model\Checkout;

class BillingAddress {

    public ?string $street = null;
    public ?string $city = null;
    public ?string $countryState = null;
    public ?string $province = null;
    public ?string $buildingNumber = null;
    public ?string $roomNumber = null;
    public ?string $postcode = null;
    public ?string $companyName = null;
    public ?string $phone = null;
    public ?string $taxId = null;

    public function __construct(?string $street = null, ?string $city = null, ?string $countryState = null, ?string $province = null, ?string $buildingNumber = null, ?string $roomNumber = null, ?string $postcode = null, ?string $companyName = null, ?string $phone = null, ?string $taxId = null) {
        $this->street = $street;
        $this->city = $city;
        $this->countryState = $countryState;
        $this->province = $province;
        $this->buildingNumber = $buildingNumber;
        $this->roomNumber = $roomNumber;
        $this->postcode = $postcode;
        $this->companyName = $companyName;
        $this->phone = $phone;
        $this->taxId = $taxId;
    }

    public function getStreet(): ?string {
        return $this->street;
    }

    public function setStreet(?string $street): void {
        $this->street = $street;
    }

    public function getCity(): ?string {
        return $this->city;
    }

    public function setCity(?string $city): void {
        $this->city = $city;
    }

    public function getCountryState(): ?string {
        return $this->countryState;
    }

    public function setCountryState(?string $countryState): void {
        $this->countryState = $countryState;
    }

    public function getProvince(): ?string {
        return $this->province;
    }

    public function setProvince(?string $province): void {
        $this->province = $province;
    }

    public function getBuildingNumber(): ?string {
        return $this->buildingNumber;
    }

    public function setBuildingNumber(?string $buildingNumber): void {
        $this->buildingNumber = $buildingNumber;
    }

    public function getRoomNumber(): ?string {
        return $this->roomNumber;
    }

    public function setRoomNumber(?string $roomNumber): void {
        $this->roomNumber = $roomNumber;
    }

    public function getPostcode(): ?string {
        return $this->postcode;
    }

    public function setPostcode(?string $postcode): void {
        $this->postcode = $postcode;
    }

    public function getCompanyName(): ?string {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): void {
        $this->companyName = $companyName;
    }

    public function getPhone(): ?string {
        return $this->phone;
    }

    public function setPhone(?string $phone): void {
        $this->phone = $phone;
    }

    public function getTaxId(): ?string {
        return $this->taxId;
    }

    public function setTaxId(?string $taxId): void {
        $this->taxId = $taxId;
    }

    public function toArray(): array {
        return [
            'street' => $this->street,
            'city' => $this->city,
            'countryState' => $this->countryState,
            'province' => $this->province,
            'buildingNumber' => $this->buildingNumber,
            'roomNumber' => $this->roomNumber,
            'postcode' => $this->postcode,
            'companyName' => $this->companyName,
            'phone' => $this->phone,
            'taxId' => $this->taxId,
        ];
    }

}