<?php

namespace App\Application\Product;

use App\Domain\Product\Entities\Product;
use App\Domain\Product\Repositories\ProductRepository;
use App\Domain\Product\ValueObjects\Money;
use App\Domain\Product\ValueObjects\StockQuantity;
use Illuminate\Support\Str;

final class ProductService
{
    public function __construct(
        private ProductRepository $repository
    ) {
    }

    public function create(array $data): void
    {
        $product = new Product(
            Str::uuid()->toString(),
            $data['name'],
            $data['description'],
            new Money($data['price']),
            new StockQuantity($data['stock_quantity'])
        );

        $this->repository->save($product);
    }

    public function decreaseStock(string $id, int $quantity): void
    {
        $product = $this->repository->findById($id);

        if (!$product) {
            throw new \DomainException('Produto não encontrado');
        }

        $product->decreaseStock($quantity);
        $this->repository->save($product);
    }
}
