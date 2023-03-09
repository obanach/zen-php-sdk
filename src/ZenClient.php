<?php

namespace Zen;

use Zen\Model\Checkout;
use Zen\Model\Configuration;

class ZenClient {

    private Configuration $configuration;

    public function __construct(string $SECRET_KEY, string $IPN_SECRET, string $TERMINAL_UUID, ?Configuration $configuration = null) {
        if (is_null($configuration)) {
            $configuration = new Configuration();
            $configuration->setSecretKey($SECRET_KEY);
            $configuration->setIpnSecret($IPN_SECRET);
            $configuration->setTerminalUuid($TERMINAL_UUID);
        }
        $this->configuration = $configuration;
    }

    public function createCheckout(Checkout $checkout): void {



    }



}