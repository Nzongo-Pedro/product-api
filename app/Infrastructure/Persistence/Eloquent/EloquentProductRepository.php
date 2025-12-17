<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Product\Entities\Product as DomainProduct;
use App\Domain\Product\Repositories\ProductRepository;
use App\Domain\Product\ValueObjects\Money;
use App\Domain\Product\ValueObjects\StockQuantity;
use App\Models\Product;

final class EloquentProductRepository implements ProductRepository
{
    public function save(DomainProduct $product): void
    {
        Product::updateOrCreate(
            ['id' => $product->id()],
            [
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price(),
                'stock_quantity' => $product->stock(),
            ]
        );
    }

    public function findById(string $id): ?DomainProduct
    {
        $model = Product::find($id);

        if (!$model)
            return null;

        return new DomainProduct(
            $model->id,
            $model->name,
            $model->description,
            new Money((float) $model->price),
            new StockQuantity($model->stock_quantity)
        );
    }
}
