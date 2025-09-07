<?php

namespace App\Services;

use App\Models\PizzaFlavor;
use App\Services\PizzaFlavorServiceInterface;

class PizzaFlavorService implements PizzaFlavorServiceInterface 
{
    public function create(array $data) 
    {
        return PizzaFlavor::firstOrCreate(
            [
                'flavor_id' => $data['flavor_id'],
                'name' => $data['name'],
                'description' => $data['description']
            ]
        );
    }

    public function all() 
    {
        return PizzaFlavor::all();
    }

    public function find($flavorId) 
    {
        return PizzaFlavor::findOrFail($flavorId);
    }

    public function update($flavorId, array $data) 
    {
        $flUpdate = PizzaFlavor::findOrFail($flavorId);
        $flUpdate->update($data);
        return $flUpdate;
    }

    public function delete($flavorId) 
    {
        $especificFlavor = PizzaFlavor::findOrFail($flavorId);
        return $especificFlavor->delete();
    }
}