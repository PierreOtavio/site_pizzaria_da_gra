<?php

namespace App\Services;

use App\Models\Product;

class ProductCatalogService implements ProductCatalogServiceInterface 
{
    public function ensureProductCatalog() 
    {
        $produtosFixos = [
            ['name' => 'Pizza Pequena', 'type' => 'pizza', 'description' => 'Pizza tamanho P (25cm de diâmetro)', 'price' => 29.90],
            ['name' => 'Pizza Média', 'type' => 'pizza', 'description' => 'Pizza tamanho M (30cm de diâmetro)', 'price' => 49.90],
            ['name' => 'Pizza Grande', 'type' => 'pizza', 'description' => 'Pizza tamanho G (35cm de diâmetro)', 'price' => 59.90],
            ['name' => 'Pizza Broto', 'type' => 'pizza', 'description' => 'Pizza tamanho broto (13cm de diâmetro)', 'price' => 8.00],
            ['name' => 'Mini Pizza', 'type' => 'pizza', 'description' => 'Pizza tamanho mini (8cm de diâmetro), bandeja c/ 12 unidades', 'price' => 28.00],
            ['name' => 'Coca Cola 2L', 'type' => 'drink', 'description' => 'Refri de 2L', 'price' => 14.90],
            ['name' => 'Coca Cola 1.5L', 'type'=> 'drink', 'description' => 'Refri de 1.5L', 'price' => 12.00],
            ['name' => 'Coca Cola 1L', 'type' => 'drink', 'description' => 'Refri de 1L', 'price' => 10.00],
            ['name' => 'Coca Cola 600ml', 'type' => 'drink', 'description' => 'Refri de 600 ml', 'price' => 8.00],
            ['name' => 'Coca Cola 350ml', 'type' => 'drink', 'description' => 'Refri de 350 ml', 'price' => 6.00],
            ['name' => 'Guaraná Antártica 2L', 'type' => 'drink', 'description' => 'Refri de 2L', 'price' => 14.90],
            ['name' => 'Guaraná Antártica 1.5L', 'type' => 'drink', 'description' => 'Refri de 1.5L', 'price' => 12.00],
            ['name' => 'Guaraná Antártica 1L', 'type' => 'drink', 'description' => 'Refri de 1L', 'price' => 10.00],
            ['name' => 'Guaraná Antártica 600ml', 'type' => 'drink', 'description' => 'Refri de 600 ml', 'price' => 8.00],
            ['name' => 'Guaraná Antártica 350ml', 'type' => 'drink', 'description' => 'Refri de 350 ml', 'price' => 6.00],
            ['name' => 'Sprite 2L', 'type' => 'drink', 'description' => 'Refri de 2L', 'price' => 14.90],
            ['name' => 'Sprite 600ml', 'type' => 'drink', 'description' => 'Refri de 600ml', 'price' => 8.00],
            ['name' => 'Sprite 350ml', 'type' => 'drink', 'description' => 'Refri de 350ml', 'price' => 6.00],
            ['name' => 'Fanta laranja 2L', 'type' => 'drink', 'description' => 'Refri de 2L', 'price' => 14.90],
            ['name' => 'Fanta laranja 1.5L', 'type' => 'drink', 'description' => 'Refri de 1.5L', 'price' => 12.00],
            ['name' => 'Fanta laranja 1L', 'type' => 'drink', 'description' => 'Refri de 1L', 'price' => 10.00],
            ['name' => 'Fanta laranja 600ml', 'type' => 'drink', 'description' => 'Refri de 600ml', 'price' => 8.00],
            ['name' => 'Fanta laranja 350ml', 'type' => 'drink', 'description' => 'Refri de 350ml', 'price' => 6.00]
        ];

        foreach ($produtosFixos as $p) {
            Product::firstOrCreate(
            ['name' => $p['name']],
            [
                'type' => $p['type'],
                'description' => $p['description'],
                'price' => $p['price'],
            ]
            );
        }
    }
}