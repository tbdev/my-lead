<?php

namespace Database\Seeders;

use App\Models\Shop\Price;
use App\Models\Shop\Product;
use Illuminate\Database\Seeder;

class ProductPriceSeeder extends Seeder
{
    public function run()
    {
        $prices = Price::all();

        Product::all()->each(function ($product) use ($prices) { 
            $product->prices()->attach(
                $prices->random(rand(1, 10))->pluck('id')->toArray()
            ); 
        });
    }
}
