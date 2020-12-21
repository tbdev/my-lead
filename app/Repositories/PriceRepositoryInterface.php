<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface PriceRepositoryInterface
{
    public function getAll(): Collection;
}
