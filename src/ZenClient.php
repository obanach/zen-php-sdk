<?php

namespace Zen;

use Zen\Exception\ZenException;
use Zen\Model\Configuration;
use Zen\Response\CheckoutResponse;
use Zen\Response\IpnResponse;
use Zen\Service\CreateCheckout;
use Zen\Service\ValidateIpn;

class ZenClient {

    private Configuration $configuration;

    public function __construct(string $ZEN_PAYWALL_SECRET, string $ZEN_IPN_SECRET, string $ZEN_TERMINAL_UUID, ?Configuration $configuration = null) {
        if (is_null($configuration)) {
            $configuration = new Configuration();
            $configuration->setPaywallSecret($ZEN_PAYWALL_SECRET);
            $configuration->setIpnSecret($ZEN_IPN_SECRET);
            $configuration->setTerminalUuid($ZEN_TERMINAL_UUID);
        }
        $this->configuration = $configuration;
    }

    public function createCheckout(array $data): CheckoutResponse {
        $checkout = new CreateCheckout($this->configuration, $data);

        try {
            return $checkout->execute();
        } catch (ZenException $e) {
            return new CheckoutResponse(false, $e->getMessage());
        }

    }

    public function validateIpn(string $data): IpnResponse {
        $data = json_decode($data, true);
        $validate = new ValidateIpn($this->configuration, $data);

        try {
            return $validate->execute();
        } catch (ZenException $e) {
            return new IpnResponse(false, $e->getMessage());
        }

    }




}