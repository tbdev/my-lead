<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shop\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->times(1000)->create();
    }
}
