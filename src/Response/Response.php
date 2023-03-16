<?php

namespace Zen\Response;

class Response {

    private bool $status;
    private ?string $message;

    public function __construct(bool $status, ?string $message = null){
        $this->status = $status;
        $this->message = $message;
    }

    public function getStatus(): bool
    {
        return $this->status;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }
}