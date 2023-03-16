<?php

namespace Zen;

use GuzzleHttp\Exception\GuzzleException;
use Zen\Exception\ZenException;
use Zen\Model\Checkout;
use Zen\Model\Configuration;
use Zen\Request\Request;
use Zen\Util\SignatureGenerator;

class ZenClient {

    private Configuration $configuration;
    private string $ZEN_TERMINAL_UUID;
    private string $ZEN_PAYWALL_SECRET;
    private string $ZEN_IPN_SECRET;

    public function __construct(string $ZEN_PAYWALL_SECRET, string $ZEN_IPN_SECRET, string $ZEN_TERMINAL_UUID, ?Configuration $configuration = null) {

        $this->ZEN_PAYWALL_SECRET = $ZEN_PAYWALL_SECRET;
        $this->ZEN_IPN_SECRET = $ZEN_IPN_SECRET;
        $this->ZEN_TERMINAL_UUID = $ZEN_TERMINAL_UUID;


        if (is_null($configuration)) {
            $configuration = new Configuration();
            $configuration->setSecretKey($ZEN_PAYWALL_SECRET);
            $configuration->setIpnSecret($ZEN_IPN_SECRET);
            $configuration->setTerminalUuid($ZEN_TERMINAL_UUID);
        }
        $this->configuration = $configuration;
    }


    public function createCheckout(Checkout $checkout): array {

        $params = $checkout->toArray();
        $params += ['terminalUuid' => $this->ZEN_TERMINAL_UUID];
        $signature = new SignatureGenerator($params, $this->ZEN_PAYWALL_SECRET);
        $params += ['signature' => $signature->getHash()];

        $request = new Request();


        return $request->post('https://secure.zen.com/api/checkouts', $params);

    }

    public function validateIpnData(array $data): void
    {

    }



}