<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemFlavor extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = true;

    protected $primaryKey = null;

    protected $fillable = 
    [
        'item_id', 
        'flavor_id', 
        'proportion'
    ];

    public function saleItem()
    {
        return $this->belongsTo(SaleItem::class, 'item_id');
    }

    public function pizzaFlavor()
    {
        return $this->belongsTo(PizzaFlavor::class, 'flavor_id');
    }
}
