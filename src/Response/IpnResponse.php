<?php

namespace Zen\Response;

class IpnResponse extends Response {

    private ?string $merchantTransactionId;
    private ?string $paymentStatus;
    private ?string $currency;
    private ?float $amount;

    public function __construct(bool $status, ?string $message = null, ?string $merchantTransactionId = null, ?string $currency = null, ?float $amount = null, ?string $paymentStatus = null){
        parent::__construct($status, $message);
        $this->merchantTransactionId = $merchantTransactionId;
        $this->currency = $currency;
        $this->amount = $amount;
        $this->paymentStatus = $paymentStatus;
    }

    public function getMerchantTransactionId(): ?string {
        return $this->merchantTransactionId;
    }

    public function getPaymentStatus(): ?string {
        return $this->paymentStatus;
    }

    public function getCurrency(): ?string {
        return $this->currency;
    }

    public function getAmount(): ?float {
        return $this->amount;
    }
}