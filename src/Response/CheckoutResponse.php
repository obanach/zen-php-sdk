<?php

namespace Zen\Response;

class CheckoutResponse extends Response {

    private ?string $redirectUrl;
    private ?string $paymentStatus;

    public function __construct(bool $status, ?string $message, ?string $redirectUrl = null, ?string $paymentStatus = null){
        parent::__construct($status, $message);
        $this->redirectUrl = $redirectUrl;
        $this->paymentStatus = $paymentStatus;
    }

    public function getRedirectUrl(): ?string {
        return $this->redirectUrl;
    }
    public function getPaymentStatus(): ?string {
        return $this->paymentStatus;
    }
}