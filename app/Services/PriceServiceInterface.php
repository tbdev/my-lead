<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

interface PriceServiceInterface
{
    public function getAllPrices(): Collection;
}
