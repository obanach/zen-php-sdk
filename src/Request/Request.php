<?php

namespace Zen\Request;

use GuzzleHttp\Client;

class Request {
    private Client $client;
    public function __construct(){
        $this->client = new Client(['https://secure.zen.com/api/']);

        return $this;
    }

    public function send($method, $path, $data): void {

    }
}