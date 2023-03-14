<?php

namespace Zen\Response;

class RequestResponse extends Response {

    private ?array $data = null;
    private ?int $statusCode = null;

    public function __construct(bool $status, ?string $message, ?array $data, ?int $statusCode){
        parent::__construct($status, $message);
        $this->data = $data;
        $this->statusCode = $statusCode;
    }

    public function getData(): ?array {
        return $this->data;
    }

    public function getStatusCode(): ?int {
        return $this->statusCode;
    }
}