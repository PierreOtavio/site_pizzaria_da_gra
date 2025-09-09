<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'customer_id';
    protected $fillable = 
    [
        'name',
        'email',
        'phone',
        'address'
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class, 'customer_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
