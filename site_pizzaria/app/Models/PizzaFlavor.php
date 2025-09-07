<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaFlavor extends Model
{
    use HasFactory;

    protected $table = 'pizza_flavors';
    protected $fillable = 
    [
        'name',
        'description'
    ];

    public function itemFlavors() 
    {
        return $this->hasMany(ItemFlavor::class, 'flavor_id');
    }
}
