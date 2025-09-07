<?php

namespace App\Services;

use App\Services\SaleItemServiceInterface;
use App\Models\Sale_Items;

class SaleItemService implements SaleServiceInterface 
{
    public function create(array $data)
    {
        return Sale_Items::create([
            'sale_id'     => $data['sale_id'],
            'product_id'  => $data['product_id'],
            'quantity'    => $data['quantity'],
            'unit_price'  => $data['unit_price'],
            'observation' => $data['observation'] ?? null,
        ]);
    }


    public function all()
    {
        return Sale_Items::all();
    }

    public function find($saleId)
    {
        return Sale_Items::findOrFail($saleId);
    }

    public function update($saleId, array $data)
    {
        $saleItem = Sale_Items::findOrFail($saleId);
        $saleItem->update($data);

        return $saleItem;
    }
    
    public function delete($saleId)
    {
        $saleItemToDel = Sale_Items::findOrFail($saleId);
        $saleItemToDel->delete();
    }
}