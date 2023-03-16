<?php

namespace Zen\Model\Checkout;

class Item {
    private ?string $code;
    private ?string $category;
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

    public function setCode(string $code): void {
        $this->code = $code;
    }

    public function getCategory(): ?string {
        return $this->category;
    }

    public function setCategory(string $category): void {
        $this->category = $category;
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
            'code' => $this->code ?? null,
            'category' => $this->category ?? null,
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'lineAmountTotal' => $this->lineAmountTotal
        ];
    }

}