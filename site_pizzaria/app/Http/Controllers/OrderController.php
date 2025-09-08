<?php

namespace App\Http\Controllers;

use App\Providers\ProductCatalogProvider;
use Illuminate\Http\Request;
use App\Services\SaleServiceInterface;
use App\Services\SaleItemServiceInterface;
use App\Services\ItemFlavorServiceInterface;
use App\Services\ProductServiceInterface;
use App\Services\PizzaFlavorServiceInterface;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    protected $saleService;
    protected $saleItemService;
    protected $itemFlavorService;
    protected $productService;
    protected $pizzaFlavorService;
    protected $product_catalog_provider;

    public function __construct(
        SaleServiceInterface $saleService,
        SaleItemServiceInterface $saleItemService,
        ItemFlavorServiceInterface $itemFlavorService,
        ProductServiceInterface $productService,
        PizzaFlavorServiceInterface $pizzaFlavorService,
        ProductCatalogProvider $product_catalog_provider
    ) {
        $this->saleService = $saleService;
        $this->saleItemService = $saleItemService;
        $this->itemFlavorService = $itemFlavorService;
        $this->productService = $productService;
        $this->pizzaFlavorService = $pizzaFlavorService;
        $this->product_catalog_provider = $product_catalog_provider;
    }

    // 1. Mostra o catálogo de pizzas e bebidas
    public function catalog()
    {
        $this->product_catalog_provider->boot();
        $products = $this->productService->all(); // Inclui pizzas, refrigerantes, etc
        $pizzaFlavors = $this->pizzaFlavorService->all();

        return view('order.catalog', compact('products', 'pizzaFlavors'));
    }

    // 2. Processa um novo pedido (venda)
    public function placeOrder(Request $request)
    {
        // Validação do pedido
        $validated = $request->validate([
            'customer_id'          => 'required|exists:customers,customer_id',
            'payment_method'       => 'required|string|max:45',
            'items'                => 'required|array|min:1',
            'items.*.product_id'   => 'required|exists:products,product_id',
            'items.*.quantity'     => 'required|integer|min:1',
            'items.*.unit_price'   => 'required|numeric|min:0',
            'items.*.observation'  => 'nullable|string|max:200',
            'items.*.pizza_flavors'=> 'nullable|array',
            'items.*.pizza_flavors.*.flavor_id'   => 'required_with:items.*.pizza_flavors|exists:pizza_flavors,flavor_id',
            'items.*.pizza_flavors.*.proportion'  => 'required_with:items.*.pizza_flavors|numeric|min:0|max:1',
        ]);

        $sale = $this->saleService->create([
        'customer_id'    => $validated['customer_id'],
        'sale_date'      => now(),
        'total_value'    => 0,
        'discount'       => 0,
        'payment_method' => $validated['payment_method'],
        'addiction'      => 0
    ]);

    $totalValue = 0;

    foreach ($validated['items'] as $item) {
        $saleItem = $this->saleItemService->create([
            'sale_id'     => $sale->sale_id,
            'product_id'  => $item['product_id'],
            'quantity'    => $item['quantity'],
            'unit_price'  => $item['unit_price'],
            'observation' => $item['observation'] ?? null,
        ]);

        $totalValue += $item['quantity'] * $item['unit_price'];

        // Checando sabores digitados pelo user (campo livre)
        if (isset($item['pizza_flavors'])) {
            foreach ($item['pizza_flavors'] as $flavorInput) {
                // 1. Busca se esse sabor já existe
                $flavor = \App\Models\PizzaFlavor::firstOrCreate(
                    ['name' => Str::title($flavorInput['name'])],
                    ['description' => $flavorInput['description'] ?? null]
                );
                // 2. Cria o vínculo no item_flavors
                $this->itemFlavorService->create([
                    'item_id'    => $saleItem->item_id,
                    'flavor_id'  => $flavor->flavor_id,
                    'proportion' => $flavorInput['proportion'],
                ]);
            }
        }
    }

    $sale->total_value = $totalValue;
    $sale->save();

    return redirect()->route('order.catalog')
                     ->with('success', 'Pedido realizado com sucesso!');
    }
}
