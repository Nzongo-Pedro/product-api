<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Product extends Model
{
    use HasUuids;

    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'stock_quantity'
    ];

    public $incrementing = false;
}

