<?php

namespace App\Services;

use App\Repositories\PriceRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PriceService implements PriceServiceInterface
{
    private PriceRepositoryInterface $priceRepository;

    public function __construct(PriceRepositoryInterface $priceRepository)
    {
        $this->priceRepository = $priceRepository;
    }

    public function getAllPrices(): Collection
    {
        return $this->priceRepository->getAll();
    }
}
