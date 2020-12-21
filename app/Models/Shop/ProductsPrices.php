<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsPrices extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'price_id'
    ];

    public $timestamps = false;

}
