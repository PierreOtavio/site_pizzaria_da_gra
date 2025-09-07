<?php

namespace App\Services;

use App\Services\ProductServiceInterface;
use App\Models\Product;

class ProductService implements ProductServiceInterface 
{
    public function create(array $data)
    {
        return Product::create([
            'name'        => $data['name'],
            'type'        => $data['type'],
            'description' => $data['description'] ?? null,
            'price'       => $data['price'],
        ]);
    }


    public function all() 
    {
        return Product::all();
    }

    public function find($productID) 
    {
        return Product::findOrFail($productID);
    }

    public function update($productId, array $data)
    {
        $product = \App\Models\Product::findOrFail($productId);
        $product->update($data);

        return $product;
    }


    public function delete($productId)
    {
        $prodToDelete = Product::findOrFail($productId);
        $prodToDelete->delete();
    }
}