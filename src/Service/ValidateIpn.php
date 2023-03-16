<?php

namespace Zen\Service;

use Zen\Exception\ZenException;
use Zen\Model\Configuration;
use Zen\Response\IpnResponse;
use Zen\Util\HashGenerator;

class ValidateIpn {

    private Configuration $configuration;
    private array $data;

    public function __construct(Configuration $configuration, array $data){
        $this->configuration = $configuration;
        $this->data = $data;
    }

    /**
     * @throws ZenException
     */
    public function execute(): IpnResponse {
        $this->validate();

        if ($this->data['hash'] === HashGenerator::generate($this->data['merchantTransactionId'], $this->data['currency'], $this->data['amount'], $this->data['status'], $this->configuration->getIpnSecret())){
            return new IpnResponse(true, 'Hash matches', $this->data['merchantTransactionId'], $this->data['currency'], (float) $this->data['amount'],$this->data['status']);
        } else {
            return new IpnResponse(false, 'Hash does not match');
        }
    }

    /**
     * @return void
     * @throws ZenException
     */
    private function validate(): void {
        if (empty($this->data['merchantTransactionId']) || !is_string($this->data['merchantTransactionId'])) {
            throw new ZenException('merchantTransactionId was not provided or is not a string');
        }
        if (empty($this->data['amount']) || !preg_match('/^(?=.*[0-9])\d{1,16}(?:\.\d{1,12})?$/', $this->data['amount'])) {
            throw new ZenException('amount was not provided or is not a float');
        }
        if (empty($this->data['currency']) || !is_string($this->data['currency']) || strlen($this->data['currency']) !== 3) {
            throw new ZenException('currency was not provided or is not a string with 3 characters');
        }
        if (empty($this->data['status']) || !is_string($this->data['status'])) {
            throw new ZenException('status was not provided or is not a string');
        }
        if (empty($this->data['hash']) || !is_string($this->data['hash'])) {
            throw new ZenException('hash was not provided or is not a string');
        }
    }

}