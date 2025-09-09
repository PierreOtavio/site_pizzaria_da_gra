<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaFlavor extends Model
{
    use HasFactory;

    protected $primaryKey = 'flavor_id';

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
