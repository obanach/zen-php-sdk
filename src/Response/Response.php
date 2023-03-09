<?php

namespace Zen\Response;

class Response {

    private bool $success = false;
    private ?string $message = null;
    private ?array $data = null;

    public function __construct(bool $success, ?string $message, ?array $data){
        $this->success = $success;
        $this->message = $message;
        $this->data = $data;
    }

    public function getStatus(): bool
    {
        return $this->success;
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