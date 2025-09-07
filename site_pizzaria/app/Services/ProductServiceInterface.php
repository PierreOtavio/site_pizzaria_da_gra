<?php

namespace App\Services;

interface ProductServiceInterface
{
    public function create(array $data);        // Cadastrar produto
    public function all();                      // Listar todos os produtos
    public function find($productId);           // Buscar produto pelo ID
    public function update($productId, array $data);
    public function delete($productId);
}
