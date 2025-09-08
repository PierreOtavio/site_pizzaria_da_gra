<?php

namespace App\Services;

use App\Services\SaleItemServiceInterface;
use App\Models\Sale_Item;

class SaleItemService implements SaleItemServiceInterface 
{
    public function create(array $data)
    {
        return Sale_Item::create([
            'sale_id'     => $data['sale_id'],
            'product_id'  => $data['product_id'],
            'quantity'    => $data['quantity'],
            'unit_price'  => $data['unit_price'],
            'observation' => $data['observation'] ?? null,
        ]);
    }


    public function all()
    {
        return Sale_Item::all();
    }

    public function find($saleId)
    {
        return Sale_Item::findOrFail($saleId);
    }

    public function update($saleId, array $data)
    {
        $saleItem = Sale_Item::findOrFail($saleId);
        $saleItem->update($data);

        return $saleItem;
    }
    
    public function delete($saleId)
    {
        $saleItemToDel = Sale_Item::findOrFail($saleId);
        $saleItemToDel->delete();
    }
}