<?php

namespace Zen\Model;

use Zen\Exception\ZenException;
use Zen\Model\Checkout\BillingAddress;
use Zen\Model\Checkout\Customer;
use Zen\Model\Checkout\Item;
use Zen\Model\Checkout\ShippingAddress;

class Checkout {

    private string $merchantTransactionId;
    private ?float $amount = null;
    private ?string $currency = null;
    private ?Customer $customer = null;
    private ?ShippingAddress $shippingAddress = null;
    private ?BillingAddress $billingAddress = null;
    private ?array $items = null;
    private ?string $urlRedirect = null;
    private ?string $urlSuccess = null;
    private ?string $urlFailure = null;
    private ?string $customIpnUrl = null;

    public function __construct(string $merchantTransactionId) {
        $this->merchantTransactionId = $merchantTransactionId;
    }

    public function setAmount(float $amount): self {
        $this->amount = $amount;
        return $this;
    }

    public function setCurrency(string $currency): self {
        $this->currency = $currency;
        return $this;
    }


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


    public function toArray(): array{
        $result = [];
        $result['merchantTransactionId'] = $this->merchantTransactionId;
        $result['amount'] = $this->amount ?? null;
        $result['currency'] = $this->currency ?? null;
        $result['customer'] = $this->customer?->toArray();
        $result['shippingAddress'] = $this->shippingAddress?->toArray();
        $result['billingAddress'] = $this->billingAddress?->toArray();
        foreach ($this->items as $item) {
            $result['items'][] = $item->toArray();
        }
        return $result;

    }
}