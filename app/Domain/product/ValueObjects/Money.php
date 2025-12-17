<?php

namespace App\Domain\Product\ValueObjects;

use InvalidArgumentException;

final class Money
{
    private float $amount;

    public function __construct(float $amount)
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException('Preço baixo');
        }

        $this->amount = $amount;
    }

    public function value(): float
    {
        return $this->amount;
    }
}
