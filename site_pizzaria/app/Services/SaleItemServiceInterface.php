<?php

namespace App\Services;

interface SaleItemServiceInterface 
{
    public function create(array $data);           // Cadastrar item de venda
    public function all();                         // Listar todos os itens de venda
    public function find($itemId);                 // Buscar item pelo ID
    public function update($itemId, array $data);  // Atualizar item de venda
    public function delete($itemId);               // Remover item de venda
}