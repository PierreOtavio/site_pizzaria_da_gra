<?php

namespace App\Services;

interface SaleServiceInterface
{
    public function create(array $data);         // Criar venda
    public function all();                       // Listar todas as vendas
    public function find($saleId);               // Buscar venda pelo ID
    public function update($saleId, array $data);// Atualizar venda
    public function delete($saleId);             // Deletar venda
}
