<?php

namespace Zen\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

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
            $array = [
                'status' => $response->getStatusCode(),
                'body' => json_decode($response->getBody()->getContents(), true)
            ];
        } catch (ClientException|GuzzleException $e) {
            $response = $e->getResponse();
            $array = [
                'status' => $response->getStatusCode(),
                'body' => json_decode($response->getBody()->getContents(), true)
            ];
        }

        return $array;
    }
}