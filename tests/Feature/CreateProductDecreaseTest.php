<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
it('Redução do produto quando é avaliado', function () {
    $product = \App\Models\Product::factory()->create([
        'stock_quantity' => 10,
    ]);

    $response = $this->patchJson(
        "/api/v1/products/{$product->id}/decrease-stock",
        ['quantity' => 3]
    );

    $response->assertOk();

    $this->assertDatabaseHas('products', [
        'id' => $product->id,
        'stock_quantity' => 7,
    ]);
});
