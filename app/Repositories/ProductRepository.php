<?php

namespace App\Repositories;

use App\Models\Shop\Product;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductRepository implements ProductRepositoryInterface
{
    const PAGINATE_DEFAULT = 10;

    public function getAll(): Collection
    {
        return Product::with('prices')->get();
    }

    public function getAllWithPaginate(int $paginate): LengthAwarePaginator
    {
        return Product::with('prices')->paginate($paginate ?? self::PAGINATE_DEFAULT);
    }

    public function getById(int $id): ?Product
    {
        return Product::where('id', $id)->first();
    }

    public function updateById(int $id, string $name, string $description, array $pricesIds): void
    {
        $product = Product::find($id);

        $product->update([
            'name' => $name,
            'description' => $description
        ]);

        $product->prices()->sync($pricesIds);
    }

    public function deleteById(int $id): bool
    {
        return Product::destroy($id);
    }

    public function createProduct(string $name, string $description, array $pricesIds): int
    {
        $product = Product::create([
            'name' => $name,
            'description' => $description,
        ]);

        $product->prices()->attach($pricesIds);

        return $product->id;
    }
}
