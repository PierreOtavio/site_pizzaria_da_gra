<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $fillable = 
    [
        'customer_id',
        'sale_date',
        'total_value',
        'discount',
        'payment_method',
        'addiction',
    ];

    public function customer() 
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function sale_items() 
    {
        return $this->hasMany(Sale_Items::class, 'sale_id');
    }
}
