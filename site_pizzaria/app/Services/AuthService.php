<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface 
{
    public function register(array $data) 
    {
        $customer = Customer::create([
            'name' => $data['name'],
            'email'=> $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        Auth::login($customer);
        return $customer;
    }

    public function login(array $credentials) 
    {
        return Auth::attempt($credentials);
    }

    public function logout() 
    {
        Auth::logout();
    }
}