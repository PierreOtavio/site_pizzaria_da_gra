<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController as ControllersCustomerController;
use App\Http\Controllers\DashboardController as ControllersDashboardController;
use App\Http\Controllers\PizzaFlavorController as ControllersPizzaFlavorController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Http\Controllers\ProfileController as ControllersProfileController;
use App\Http\Controllers\SaleController as ControllersSaleController;
use App\Http\Controllers\SaleItemController as ControllerSaleItemsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('newWelcome/welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ControllersProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ControllersProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ControllersProfileController::class, 'update'])->name('profile.update');
});
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [ControllersDashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ControllersProductController::class);
    Route::resource('pizza-flavors', ControllersPizzaFlavorController::class);
    Route::resource('customers', ControllersCustomerController::class);
    Route::resource('sales', ControllersSaleController::class);
    Route::resource('saleItems', ControllerSaleItemsController::class);
});


