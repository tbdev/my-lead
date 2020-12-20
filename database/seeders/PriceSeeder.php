<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shop\Price;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Price::factory()->times(1000)->create();
    }
}
