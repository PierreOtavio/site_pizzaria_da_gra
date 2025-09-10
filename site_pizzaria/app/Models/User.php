<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adminlte_desc()
    {
        // Aqui você decide o que mostrar. Exemplos:
        return $this->customer->email ?? $this->email; // Mostra o email do profile (customer)
        // Ou:
        // return $this->customer->phone ?? 'Sem telefone';
    }

    public function adminlte_profile_url()
    {
        // Para acessar /admin/profile (rotas agrupadas)
        return route('profile.show');
    }


    public function customer()
    {
        return $this->hasOne(Customer::class, 'user_id');
    }

}
