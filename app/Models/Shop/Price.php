<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'price'
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'products_prices');
    }

    public function getPrice()
    {
        return number_format($this->price / 100, 2, '.', '.');
    }
}
