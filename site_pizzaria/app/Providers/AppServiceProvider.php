<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CustomerServiceInterface;
use App\Services\CustomerService;
use App\Services\ProductServiceInterface;
use App\Services\ProductService;
use App\Services\SaleServiceInterface;
use App\Services\SaleService;
use App\Services\SaleItemServiceInterface;
use App\Services\SaleItemService;
use App\Services\ItemFlavorServiceInterface;
use App\Services\ItemFlavorService;
use App\Services\PizzaFlavorServiceInterface;
use App\Services\PizzaFlavorService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\AuthServiceInterface::class,
            \App\Services\AuthService::class
        );
        $this->app->bind(
            \App\Services\CustomerServiceInterface::class,
            \App\Services\CustomerService::class
        );
        $this->app->bind(
            \App\Services\ItemFlavorServiceInterface::class,
            \App\Services\ItemFlavorService::class
        );
        $this->app->bind(
            \App\Services\PizzaFlavorServiceInterface::class,
            \App\Services\PizzaFlavorService::class
        );
        $this->app->bind(
            \App\Services\ProductCatalogServiceInterface::class,
            \App\Services\ProductCatalogService::class
        );
        $this->app->bind(
            \App\Services\ProductServiceInterface::class,
            \App\Services\ProductService::class
        );
        $this->app->bind(
            \App\Services\SaleItemServiceInterface::class,
            \App\Services\SaleItemService::class
        );
        $this->app->bind(
            \App\Services\SaleServiceInterface::class,
            \App\Services\SaleService::class
        );
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
