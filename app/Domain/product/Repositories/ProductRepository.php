<?php

namespace App\Domain\Product\Repositories;

use App\Domain\Product\Entities\Product;

interface ProductRepository
{
    public function save(Product $product): void;
    public function findById(string $id): ?Product;
}
