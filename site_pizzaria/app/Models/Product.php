<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = 
    [
        'name',
        'type',
        'description',
        'price',
    ];

    public function saleItems() 
    {
        return $this->hasMany(Sale_Items::class, 'product_id');
    }
}
