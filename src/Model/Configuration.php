<?php

namespace Zen\Model;

class Configuration {

    private string $SECRET_KEY;
    private string $IPN_SECRET;
    private string $TERMINAL_UUID;

    public function getSecretKey(): string {
        return $this->SECRET_KEY;
    }

    public function setSecretKey(string $SECRET_KEY): self {
        $this->SECRET_KEY = $SECRET_KEY;
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