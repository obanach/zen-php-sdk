<?php

namespace Zen\Model;

use Zen\Model\Checkout\BillingAddress;
use Zen\Model\Checkout\Customer;
use Zen\Model\Checkout\Item;
use Zen\Model\Checkout\ShippingAddress;

class Checkout {

    private ?float $amount = null;
    private ?string $currency = null;
    private ?string $transactionId = null;
    private ?Customer $customer = null;
    private ?ShippingAddress $shippingAddress = null;
    private ?BillingAddress $billingAddress = null;
    private ?array $items = null;
    private ?string $urlRedirect = null;
    private ?string $urlSuccess = null;
    private ?string $urlFailure = null;
    private ?string $customIpnUrl = null;

    public function addItem(Item $item): void {
        $this->items[] = $item;
    }

    public function setCustomer(Customer $customer): self {
        $this->customer = $customer;
        return $this;
    }

    public function setShippingAddress(ShippingAddress $shippingAddress): self {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }

    public function setBillingAddress(BillingAddress $billingAddress): self {
        $this->billingAddress = $billingAddress;
        return $this;
    }

    public function validate(): void {

    }

}