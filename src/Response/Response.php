<?php

namespace Zen\Response;

class Response {

    private bool $status = false;
    private ?string $message = null;
    private ?array $data = null;

    public function __construct(bool $status, ?string $message, ?array $data){
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
    }

    public function getStatus(): bool
    {
        return $this->status;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function getData(): ?array
    {
        return $this->data;
    }
}