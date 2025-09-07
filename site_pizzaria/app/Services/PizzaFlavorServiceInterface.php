<?php

namespace App\Services;

interface PizzaFlavorServiceInterface
{
    public function create(array $data);          // Criar novo sabor de pizza
    public function all();                        // Listar todos os sabores
    public function find($flavorId);              // Buscar sabor pelo ID
    public function update($flavorId, array $data); // Atualizar sabor
    public function delete($flavorId);            // Remover sabor
}
