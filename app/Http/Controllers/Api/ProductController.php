<?php

namespace App\Http\Controllers\Api;

use App\Application\Product\ProductService;
use App\Domain\Product\Exceptions\InsufficientStockException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\DecreaseStockRequest;
use DomainException;
use Illuminate\Http\JsonResponse;

final class ProductController extends Controller
{
    public function __construct(
        private ProductService $service
    ) {
    }

    // POST /api/v1/products
    public function store(StoreProductRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return response()->json([
            'message' => 'Product created successfully',
        ], 201);
    }

    // PATCH /api/v1/products/{id}/decrease-stock
    public function decreaseStock(
        string $id,
        DecreaseStockRequest $request
    ): JsonResponse {
        try {
            $this->service->decreaseStock($id, $request->validated()['quantity']);

            return response()->json([
                'message' => 'Stock decreased successfully',
            ]);
        } catch (InsufficientStockException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        } catch (DomainException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 404);
        }
    }
}
