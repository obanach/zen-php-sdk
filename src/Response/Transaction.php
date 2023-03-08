<?php

namespace Zen\Response;

class Transaction {

    private string $paymentId;
    private string $status;
    private string $redirectURL;

    public function getPaymentId(): string {
        return $this->paymentId;
    }

    public function getStatus

}