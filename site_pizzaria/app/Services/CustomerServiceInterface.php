<?php

namespace App\Services;

interface CustomerServiceInterface
{
    public function create(array $data);     // Cadastrar cliente
    public function all();                   // Listar todos
    public function find($customerID);       // Buscar por ID (em vez de "edit")
    public function update($customerID, array $data);
    public function delete($customerID);
}
