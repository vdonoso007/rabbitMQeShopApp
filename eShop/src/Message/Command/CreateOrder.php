<?php

namespace App\Message\Command;

class CreateOrder {

    private $productId;
    private $amount;

    public function __construct(string $productId, float $amount)
    {
        $this->productId = $productId;
        $this->amount = $amount;
    }


    public function getProductId(): string
    {
        return $this->productId;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }
}