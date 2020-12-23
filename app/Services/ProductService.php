<?php

namespace App\Services;

use App\Models\Shop\Product;
use App\Repositories\ProductRepositoryInterface;
use App\Services\ProductServiceInterface;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\RedirectResponse as Redirect;

class ProductService implements ProductServiceInterface 
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    
    public function getAllProducts(): Collection
    {
        return $this->productRepository->getAll();
    }

    public function getAllProductsWithPaginate(): LengthAwarePaginator
    {
        return $this->productRepository->getAllWithPaginate(5);
    }

    public function getProductById(int $id): ?Product
    {
        return $this->productRepository->getById($id);
    }

    public function updateProduct(ProductRequest $request): void
    {
        $this->productRepository->updateById(
            $request->product_id, 
            $request->name,
            $request->description,
            $request->prices
        );
    }
    
    public function deleteProductById(int $id): Redirect
    {
        if(!$this->productRepository->deleteById($id))
        {
            return redirect()->route('home')->with('status', 'Someting go wrong!');
        }

        return redirect()->route('home')->with('status', 'Product deleted!');
       
    }

    public function createProduct(ProductRequest $request): Product
    {
        return $this->productRepository->createProduct(
            $request->name,
            $request->description,
            $request->prices
        );
    }


}
