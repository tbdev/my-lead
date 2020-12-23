<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Shop\Product;

interface ProductRepositoryInterface
{
    public function getAll(): Collection;
    public function getAllWithPaginate(int $paginate): LengthAwarePaginator;
    public function getById(int $id): ?Product;
    public function updateById(int $id, string $name, string $description, array $pricesIds): void;
    public function deleteById(int $id): bool;
    public function createProduct(string $name, string $description, array $pricesIds): Product;
}
