<?php

namespace App\Services;

use App\Models\Customer;
use App\Services\CustomerServiceInterface;
use Illuminate\Support\Facades\Hash;

class CustomerService implements CustomerServiceInterface 
{
    public function create(array $data) 
    {
        if(empty($data['name']) || empty($data['email'])) 
        {
            throw new \Exception('Preencha corretamente os campos', 400);
        }

        if(isset($data['password'])) 
        {
            $data['password'] = Hash::make($data['password']);
        }

        $customer = Customer::create($data);
        return $customer;
    }

    public function all() 
    {
        return Customer::all();
    }

    public function find($customerID) 
    {
        return Customer::findOrFail($customerID);
    }

    public function update($customerID, array $data) 
    {
        $customer = Customer::findOrFail($customerID);

        if(isset($data['password']) && $data['password']) 
        {
            $data['password'] = Hash::make($data['password']);
        } else 
        {
            unset($data['password']);
        }

        $customer->update($data);
        return $customer;
    }

    public function delete($customerID)
    {
        $customer = Customer::findOrFail($customerID);
        return $customer->delete();
    }

}