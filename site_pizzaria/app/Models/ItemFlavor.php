<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemFlavor extends Model
{
    use HasFactory;

    protected $table = 'item_flavors';
    protected $primaryKey = null;
    public $incrementing = false;
    protected $fillable = 
    [
        'item_id',
        'flavor_id',
        'proportion'
    ];

    public function saleItem() 
    {
        return $this->belongsTo(Sale_Items::class, 'item_id');
    }

    public function pizzaFlavor() 
    {
        return $this->belongsTo(PizzaFlavor::class, 'flavor_id');
    }
}
