<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory([
            'name' => 'admin',
            'email' => 'admin@mylead.com',
            'email_verified_at' => now(),
            'password' => Hash::make('mylead'),
            'remember_token' => Str::random(10)
            ])
        ->create();
    }
}
