<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// use App\Repositories\ProductRepository;
// use App\Repositories\ProductRepositoryInterface;
use App\Services\ProductService;
use App\Services\ProductServiceInterface;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Pagination\Paginator;
use App\Services\PriceService;
use App\Services\PriceServiceInterface;
use App\Repositories\PriceRepository;
use App\Repositories\PriceRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        ProductServiceInterface::class => ProductService::class,
        ProductRepositoryInterface::class => ProductRepository::class,
        PriceServiceInterface::class => PriceService::class,
        PriceRepositoryInterface::class => PriceRepository::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
