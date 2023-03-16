<?php

namespace Zen\Service;

use Zen\Model\Configuration;
use Zen\Request\Request;
use Zen\Util\SignatureGenerator;

class CreateCheckout {

    private Configuration $configuration;
    private Request $request;
    private array $params;

    public function __construct(Configuration $configuration, array $checkout) {
        $this->configuration = $configuration;
        $this->params = $checkout->toArray();
        $this->request = new Request();
    }


    private function setParams(): void {
        $this->params += ['terminalUuid' => $this->configuration->getTerminalUuid()];
        $signature = new SignatureGenerator($this->params, $this->configuration->getSecretKey());
        $this->params += ['signature' => $signature->getHash()];
    }







}