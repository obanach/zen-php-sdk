<?php

namespace Zen\Model\Checkout;

class Item {
    private ?string $code = null;
    private ?string $category = null;
    private string $name;
    private float $price;
    private int $quantity;
    private float $lineAmountTotal;

    public function __construct($name, $price, $quantity, ?string $code = null, ?string $category = null){
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->lineAmountTotal = $price * $quantity;
        $this->code = $code;
        $this->category = $category;
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

    public function toArray(): array {
        return [
            'code' => $this->code,
            'category' => $this->category,
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'lineAmountTotal' => $this->lineAmountTotal
        ];
    }

}