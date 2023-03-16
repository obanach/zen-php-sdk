<?php

namespace Zen\Response;

class CheckoutResponse extends Response {

    private ?string $redirectUrl;

    public function __construct(bool $status, ?string $message = null, ?string $redirectUrl = null){
        parent::__construct($status, $message);
        $this->redirectUrl = $redirectUrl;
    }

    public function getCheckoutUrl(): ?string {
        return $this->redirectUrl;
    }
}