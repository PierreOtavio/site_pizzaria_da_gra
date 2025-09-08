<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $table = 'customers';
    protected $primaryKey = 'customer_id'; // pois sua tabela usa esse campo

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address'
    ];

    protected $hidden = [
        'password',
    ];

    public function sales() 
    {
        return $this->hasMany(Sale::class, 'customer_id');
    }
}
