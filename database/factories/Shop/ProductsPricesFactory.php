<?php

namespace Database\Factories\Shop;

use App\Models\Shop\Product;
use App\Models\Shop\Price;
use App\Models\Shop\ProductsPrices;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsPricesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductsPrices::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'price_id' => Price::factory()
        ];
    }

    
}
