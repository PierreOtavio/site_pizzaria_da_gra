<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Sale_Item;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSales = Sale::count();
        $totalProducts = Product::count();
        $totalCustomers = Customer::count();
        $totalItems = Sale_Item::count();

        return view('admin.dashboard', compact('totalSales', 'totalProducts', 'totalCustomers', 'totalItems'));
    }
}
