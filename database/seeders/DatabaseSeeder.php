<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProductSeeder::class,
            PriceSeeder::class,
            ProductPriceSeeder::class,
            UserSeeder::class
        ]);
    }
}
