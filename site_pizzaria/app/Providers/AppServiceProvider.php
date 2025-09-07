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
        $this->app->bind(CustomerServiceInterface::class, CustomerService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(SaleServiceInterface::class, SaleService::class);
        $this->app->bind(SaleItemServiceInterface::class, SaleItemService::class);
        $this->app->bind(ItemFlavorServiceInterface::class, ItemFlavorService::class);
        $this->app->bind(PizzaFlavorServiceInterface::class, PizzaFlavorService::class);
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
