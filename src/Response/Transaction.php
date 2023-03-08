<?php

namespace Zen\Response;

class Transaction {

    private string $paymentId;
    private string $status;
    private string $redirectURL;

    public function __construct(string $paymentId, string $status, string $redirectURL) {
        $this->paymentId = $paymentId;
        $this->status = $status;
        $this->redirectURL = $redirectURL;
    }

    public function getPaymentId(): string {
        return $this->paymentId;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function getRedirectURL(): string {
        return $this->redirectURL;
    }

}