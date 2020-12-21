<?php

namespace App\Repositories;

use App\Models\Shop\Price;
use Illuminate\Database\Eloquent\Collection;

class PriceRepository implements PriceRepositoryInterface
{
    public function getAll(): Collection
    {
        return Price::all();
    }
}
