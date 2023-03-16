<?php

namespace Zen\Model;

class Configuration {

    private string $PAYWALL_SECRET;
    private string $IPN_SECRET;
    private string $TERMINAL_UUID;

    public function getPaywallSecret(): string {
        return $this->PAYWALL_SECRET;
    }

    public function setPaywallSecret(string $PAYWALL_SECRET): self {
        $this->PAYWALL_SECRET = $PAYWALL_SECRET;
        return $this;
    }

    public function getIpnSecret(): string {
        return $this->IPN_SECRET;
    }

    public function setIpnSecret(string $IPN_SECRET): self {
        $this->IPN_SECRET = $IPN_SECRET;
        return $this;
    }

    public function getTerminalUuid(): string {
        return $this->TERMINAL_UUID;
    }

    public function setTerminalUuid(string $TERMINAL_UUID): self {
        $this->TERMINAL_UUID = $TERMINAL_UUID;
        return $this;
    }

}