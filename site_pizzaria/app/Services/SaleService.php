<?php

namespace App\Services;

use App\Services\SaleServiceInterface;
use App\Models\Sale;

class SaleService implements SaleServiceInterface 
{
    public function create(array $data)
    {
        return Sale::create([
            'customer_id'   => $data['customer_id'],
            'sale_date'     => $data['sale_date'],
            'total_value'   => $data['total_value'],
            'discount'      => $data['discount'] ?? null,
            'payment_method'=> $data['payment_method'],
            'addiction'     => $data['addiction'] ?? null,
        ]);
    }

    public function all()
    {
        return Sale::all();
    }

    public function find($saleId)
    {
        return Sale::findOrFail($saleId);
    }

    public function update($saleId, array $data)
    {
        $saleUp = Sale::findOrFail($saleId);
        $saleUp->update($data);

        return $saleUp;
    }

    public function delete($saleId)
    {
        $saleDel = Sale::findOrFail($saleId);
        $saleDel->delete();
    }
}