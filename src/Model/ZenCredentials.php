<?php

namespace Zen\Model;
class ZenCredentials
{

    private string $SECRET_KEY;
    private string $IPN_SECRET;
    private string $TERMINAL_UUID;

    public function __construct($SECRET_KEY, $IPN_SECRET, $TERMINAL_UUID)
    {
        $this->SECRET_KEY = $SECRET_KEY;
        $this->IPN_SECRET = $IPN_SECRET;
        $this->TERMINAL_UUID = $TERMINAL_UUID;
    }

    public function getSecretKey(): string
    {
        return $this->SECRET_KEY;
    }

    public function getIpnSecret(): string
    {
        return $this->IPN_SECRET;
    }

    public function getTerminalUuid(): string
    {
        return $this->TERMINAL_UUID;
    }
}