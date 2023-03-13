<?php

namespace Zen\Request;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Zen\Exception\ZenException;

class Request {
    protected Client $client;
    public function __construct(){
        $this->client = new Client([]);
        return $this;
    }

    /**
     * @throws GuzzleException
     */
    public function post($path, $data): array {

        $headers = [
            'Content-Type' => 'application/json'
        ];

        try {
            $response = $this->client->request('POST', $path, [
                'headers' => $headers,
                'json' => $data,
            ]);
        } catch (ClientException $e) {
            $response = $e->getResponse();
            return [
                'status' => $response->getStatusCode(),
                'body' => $response->getBody()->getContents()
            ];
        }

        return [
            'status' => $response->getStatusCode(),
            'body' => $response->getBody()->getContents()
        ];
    }
}