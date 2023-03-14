<?php

namespace Zen\Response;

class Response {

    private bool $status = false;
    private ?string $message = null;

    public function __construct(bool $status, ?string $message){
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