<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController as UserOrderController;
use App\Http\Controllers\ProductController as AdminProductController;
use App\Http\Controllers\CustomerController as AdminCustomerController;
use App\Http\Controllers\SaleController as AdminSaleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PizzaFlavorController as ControllersPizzaFlavorController;
use App\Http\Controllers\SaleItemController as ControllersSaleItemController;



// ---------- ROTAS PÚBLICAS/CLIENTE (User) ----------

// Página inicial do catálogo de produtos (pedido)
Route::get('/', [UserOrderController::class, 'catalog'])->name('order.catalog');

// Registro e Login do Cliente
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Fazer um pedido (enviar formulário do catálogo)
Route::post('/order', [UserOrderController::class, 'placeOrder'])->name('order.place');

// ----------- ROTAS RESTRITAS AO CLIENTE LOGADO (User) -----------
Route::middleware(['auth'])->group(function() {
    // Exemplo: histórico de pedidos do cliente
    Route::get('/orders/history', [UserOrderController::class, 'history'])->name('orders.history');
    // Exemplo: visualizar dados do perfil
    Route::get('/me', function() {
        return view('user.profile', ['customer' => auth()->user()]);
    })->name('user.profile');
});

// ---------- ROTAS DO ADMINISTRADOR (Admin) ----------
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function() {
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // CRUD Produtos
    Route::resource('products', AdminProductController::class);

    // CRUD Clientes
    Route::resource('customers', AdminCustomerController::class);

    // CRUD Vendas (Sales)
    Route::resource('sales', AdminSaleController::class);

    // (Opcional) CRUD de sabores de pizza pelo admin:
    Route::resource('pizza-flavors', ControllersPizzaFlavorController::class);

    // (Opcional) CRUD SaleItems (itens de venda) pelo admin:
    Route::resource('sale-items', ControllersSaleItemController::class);
});

// ---------- Fallback (404 elegante) ----------
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

