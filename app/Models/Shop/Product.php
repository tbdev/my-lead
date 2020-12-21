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

    public function checkPrice(int $id)
    {
        $this->prices->contains(function ($value, $key) use ($id) {
            return $value > 5;
        });
    }
}
