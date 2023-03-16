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

    public function post($path, $data): array {

        try {
            $response = $this->client->request('POST', $path, [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'json' => $data,
            ]);
        } catch (ClientException|GuzzleException $e) {
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