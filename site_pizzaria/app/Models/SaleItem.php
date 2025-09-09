<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'item_id';

    protected $fillable = 
    [
        'sale_id', 
        'product_id', 
        'quantity', 
        'unit_price', 
        'observation'
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function itemFlavors()
    {
        return $this->hasMany(ItemFlavor::class, 'item_id');
    }
}
