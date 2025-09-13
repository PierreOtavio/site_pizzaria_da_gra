<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Proteger rotas por autenticação e política
     */
    public function __construct()
    {
        $this->authorizeResource(Customer::class, 'customer');
    }

    /**
     * Listagem dos clientes (paginado e ordenado)
     */
    public function index()
    {
        $customers = Customer::orderBy('name')->paginate(15);
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Mostra formulário de criação
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Registra novo cliente no banco
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100|unique:customers,email',
            'phone'   => 'nullable|string|max:45',
            'address' => 'nullable|string|max:255',
        ]);

        Customer::create($validated);
        return redirect()->route('admin.customers.index')
            ->with('success', 'Cliente cadastrado com sucesso!');
    }

    /**
     * Visualiza os detalhes de um cliente
     */
    public function show(Customer $customer)
    {
        return view('admin.customers.show', compact('customer'));
    }

    /**
     * Formulário de edição de cliente
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Atualização dos dados de um cliente
     */
    public function update(Request $request, Customer $customer)
    {
        // dd($customer, $customer->id, $request->all());
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email' => [
                'required',
                'email',
                'max:100',
                Rule::unique('customers', 'email')->ignore($customer->customer_id, "customer_id"),
            ],
            'phone'   => 'nullable|string|max:45',
            'address' => 'nullable|string|max:255',
        ]);

        $customer->update($validated);
        return redirect()->route('admin.customers.show', $customer)
            ->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove um cliente do banco
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('admin.customers.index')
            ->with('success', 'Cliente removido com sucesso!');
    }
}
