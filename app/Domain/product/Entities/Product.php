<?php

namespace App\Domain\Product\Entities;

use App\Domain\Product\ValueObjects\Money;
use App\Domain\Product\ValueObjects\StockQuantity;

final class Product
{
    public function __construct(
        private string $id,
        private string $name,
        private string $description,
        private Money $price,
        private StockQuantity $stock
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function decreaseStock(int $quantity): void
    {
        $this->stock = $this->stock->decrease($quantity);
    }

    public function stock(): int
    {
        return $this->stock->value();
    }

    public function price(): float
    {
        return $this->price->value();
    }
}
