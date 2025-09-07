<?php

namespace App\Services;

interface ItemFlavorServiceInterface
{
    public function create(array $data);           // Cadastrar um sabor em um item
    public function all();                         // Listar todos os registros de sabores por item
    public function find($itemId, $flavorId);      // Buscar um registro usando a chave composta (item_id, flavor_id)
    public function update($itemId, $flavorId, array $data); // Atualizar a proporção ou outro campo
    public function delete($itemId, $flavorId);    // Remover um sabor de um item
}
