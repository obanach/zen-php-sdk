<?php

namespace Zen\Model;

use Zen\Model\Payment\BillingAddress;
use Zen\Model\Payment\Customer;
use Zen\Model\Payment\Item;
use Zen\Model\Payment\ShippingAddress;

class Payment {

    private ZenCredentials $zenCredentials;
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


    public function __construct(ZenCredentials $zenCredentials){
        $this->zenCredentials = $zenCredentials;
    }

    public function addItem(Item $item): self {
        $this->items[] = $item;
        return $this;
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

}