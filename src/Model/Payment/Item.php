<?php

namespace Zen\Model\Payment;

class Item {
    private ?string $code = null;
    private ?string $category = null;
    private string $name;
    private float $price;
    private int $quantity;
    private float $lineAmountTotal;

    public function __construct($name, $price, $quantity){
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->lineAmountTotal = $price * $quantity;
    }

    public function getCode(): ?string {
        return $this->code;
    }

    public function setCode(string $code): self {
        $this->code = $code;
        return $this;
    }

    public function getCategory(): ?string {
        return $this->category;
    }

    public function setCategory(string $category): self {
        $this->category = $category;
        return $this;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function getLineAmountTotal(): float {
        return $this->lineAmountTotal;
    }



}