<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\ProductServiceInterface;
use App\Services\PriceServiceInterface;
use App\Http\Requests\ProductRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse as Redirect;

class ProductController extends Controller
{
    private ProductServiceInterface $productService;

    public function __construct(ProductServiceInterface $productService, PriceServiceInterface $priceService)
    {
        $this->productService = $productService;
        $this->priceService = $priceService;
    }

    public function index(): View
    {
        return view('shop.products.list', [
            'products' => $this->productService->getAllProductsWithPaginate()
        ]);
    }

    public function edit(int $productId): View|Redirect
    {
        $product = $this->productService->getProductById($productId);

        if(!$product)
        {
            return redirect()->route('home')->with('status', 'Someting go wrong!');
        }

        $activePrices = $product->prices->pluck('id')->toArray();

        return view('shop.products.edit_product', [
            'product' => $product,
            'prices' => $this->priceService->getAllPrices(),
            'selected' => $activePrices
        ]);
    }

    public function delete(int $id): Redirect
    {
        return $this->productService->deleteProductById($id);
    }

    public function update(ProductRequest $request): Redirect
    {
        $this->productService->updateProduct($request);
        
        return redirect()
            ->route('product.edit', ['id' => $request->product_id])
            ->with('status', 'Product updated!');
    }

    public function add(): View
    {
        return view('shop.products.create_product', [
            'prices' => $this->priceService->getAllPrices(),
        ]);
    }

    public function store(ProductRequest $request): Redirect
    {
        $product = $this->productService->createProduct($request);
        
        return redirect()
            ->route('product.edit', ['id' => $product->id])
            ->with('status', 'You add new product!');
    }
}
