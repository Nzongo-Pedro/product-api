<?php

namespace App\Domain\Product\Exceptions;

use DomainException;

final class InsufficientStockException extends DomainException
{
    protected $message = 'Stock insuficiente para essa operação.';
}
