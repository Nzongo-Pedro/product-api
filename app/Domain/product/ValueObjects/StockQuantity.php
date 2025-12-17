<?php

namespace App\Domain\Product\ValueObjects;

use InvalidArgumentException;

final class StockQuantity
{
    private int $quantity;

    public function __construct(int $quantity)
    {
        if ($quantity < 0) {
            throw new InvalidArgumentException('Stok não poder ser negativo.');
        }

        $this->quantity = $quantity;
    }

    public function value(): int
    {
        return $this->quantity;
    }

    public function decrease(int $amount): self
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException('O decremento deve ser positivo.');
        }

        if ($amount > $this->quantity) {
            throw new \App\Domain\Product\Exceptions\InsufficientStockException();
        }

        return new self($this->quantity - $amount);
    }
}
