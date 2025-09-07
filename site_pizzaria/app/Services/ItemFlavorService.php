<?php

namespace App\Services;

use App\Models\ItemFlavor;
use App\Services\ItemFlavorServiceInterface;

class ItemFlavorService implements ItemFlavorServiceInterface 
{
    public function create(array $data) 
    {
        return \App\Models\ItemFlavor::firstOrCreate(
            [
                'item_id' => $data['item_id'],
                'flavor_id' => $data['flavor_id'],
                'proportion' => $data['proportion'] ?? null
            ]
        ); 
    }

    public function all() 
    {
        return ItemFlavor::all();
    }

    public function find($itemId, $flavorId) 
    {
        return ItemFlavor::findOrFail($itemId, $flavorId);
    }

    public function update($itemId, $flavorId, array $data)
    {
        $itemFlavor = ItemFlavor::where('item_id', $itemId)
                                ->where('flavor_id', $flavorId)
                                ->firstOrFail();

        $itemFlavor->update($data);
        return $itemFlavor;
    }

    public function delete($itemId, $flavorId)
    {
        $ItemFlavors = ItemFlavor::findOrFail($itemId, $flavorId);
        return $ItemFlavors->delete();
    }
}