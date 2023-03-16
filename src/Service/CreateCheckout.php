<?php

namespace Zen\Service;

use Zen\Exception\ZenException;
use Zen\Model\Checkout;
use Zen\Model\Configuration;
use Zen\Request\Request;
use Zen\Response\CheckoutResponse;
use Zen\Util\SignatureGenerator;

class CreateCheckout {

    private Configuration $configuration;
    private Request $request;
    private array $params;

    public function __construct(Configuration $configuration, array $checkout) {
        $this->configuration = $configuration;
        $this->request = new Request();
        $this->params = $checkout;
    }

    /**
     * @throws ZenException
     */
    public function execute(): CheckoutResponse{
        $this->validate();
        $this->signParams();
        return new CheckoutResponse(true, null, $this->makeRequest());
    }

    /**
     * @throws ZenException
     */
    private function validate(): void {
        if (empty($this->params['merchantTransactionId']) || !is_string($this->params['merchantTransactionId'])) {
            throw new ZenException('merchantTransactionId is required and must be a string');
        }
        if (empty($this->params['amount']) || !is_float($this->params['amount'])) {
            throw new ZenException('amount is required and must be a float');
        }
        if (empty($this->params['currency']) || !is_string($this->params['currency']) || strlen($this->params['currency']) !== 3) {
            throw new ZenException('currency is required and must be a string with 3 characters');
        }
        if (empty($this->params['items']) || !is_array($this->params['items'])) {
            throw new ZenException('at least one item is required and must be an array');
        }
        if (empty($this->params['items'][0]['name']) || !is_string($this->params['items'][0]['name'])) {
            throw new ZenException('item name is required and must be a string');
        }
        if (empty($this->params['items'][0]['price']) || !is_float($this->params['items'][0]['price'])) {
            throw new ZenException('item price is required and must be a float');
        }
        if (empty($this->params['items'][0]['quantity']) || !is_int($this->params['items'][0]['quantity'])) {
            throw new ZenException('item quantity is required and must be an integer');
        }
        if (empty($this->params['items'][0]['lineAmountTotal']) || !is_float($this->params['items'][0]['lineAmountTotal'])) {
            throw new ZenException('item lineAmountTotal is required and must be an float');
        }

    }


    private function signParams(): void {
        $this->params += ['terminalUuid' => $this->configuration->getTerminalUuid()];
        $this->params += ['signature' => SignatureGenerator::generate($this->params, $this->configuration->getPaywallSecret())];
    }

    /**
     * @throws ZenException
     */
    private function makeRequest(): string {
        $response = $this->request->post('https://secure.zen.com/api/checkouts', $this->params);

        if ($response['status'] !== 201) {
            throw new ZenException('Zen API error: '.$response['body']['error']['code'].': '.$response['body']['error']['message']);
        }

        return $response['body']['redirectUrl'];
    }







}