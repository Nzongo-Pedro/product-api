<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('Falha ao decrementar. Stock insuficiente', function () {
    $product = \App\Models\Product::factory()->create([
        'stock_quantity' => 2,
    ]);

    $response = $this->patchJson(
        "/api/v1/products/{$product->id}/decrease-stock",
        ['quantity' => 5]
    );

    $response->assertStatus(400)
        ->assertJson([
            'message' => 'IStock baixo ou insuficiente.',
        ]);
});
