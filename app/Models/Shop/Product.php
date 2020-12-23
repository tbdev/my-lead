<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function prices()
    {
        return $this->belongsToMany(Price::class, 'products_prices');
    }
}
