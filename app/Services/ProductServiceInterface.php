<?php

namespace App\Services;

use App\Models\Shop\Product;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\RedirectResponse as Redirect;


interface ProductServiceInterface
{
    public function getAllProducts(): Collection;
    public function getAllProductsWithPaginate(): LengthAwarePaginator;
    public function getProductById(int $id): ?Product;
    public function updateProduct(ProductRequest $productRequest): void;
    public function deleteProductById(int $id): Redirect;
    public function createProduct(ProductRequest $request): Product;
}
