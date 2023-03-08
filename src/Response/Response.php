<?php

namespace Zen\Response;

class Response {

    private bool $success = false;
    private ?string $response = null;

    private ?array $data = null;

    public function __construct(?bool $success, ?string $response, ?array $data){
        $this->success = $success;
        $this->response = $response;
        $this->data = $data;
    }

    public function getStatus(): bool
    {
        return $this->success;
    }

    public function getResponse(): ?string
    {
        return $this->response;
    }

    public function getData(): ?array
    {
        return $this->data;
    }
}