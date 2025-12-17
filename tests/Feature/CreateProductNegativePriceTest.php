<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('Falha ao criar produto com preço negativo', function () {
    $response = $this->postJson('/api/v1/products', [
        'name' => 'Mouse',
        'description' => 'Óptico',
        'price' => -10,
        'stock_quantity' => 5,
    ]);

    $response->assertStatus(422);
});
