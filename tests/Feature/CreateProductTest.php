<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('Criar produtos com dados válidos', function () {
    $response = $this->postJson('/api/v1/products', [
        'name' => 'Teclado Mecânico',
        'description' => 'Switch azul barulhento',
        'price' => 150.50,
        'stock_quantity' => 10,
    ]);

    $response->assertCreated();

    $this->assertDatabaseHas('products', [
        'name' => 'Teclado Mecânico',
        'stock_quantity' => 10,
    ]);
});
