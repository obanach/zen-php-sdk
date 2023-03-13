<?php

namespace Zen\Service;

use Zen\Model\Configuration;

class CreateCheckout {

    private Configuration $configuration;
    private array $checkout;

    public function __construct(Configuration $configuration, array $checkout) {
        $this->configuration = $configuration;
        $this->checkout = $checkout;
    }



}