<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Services\CustomerService;
use App\Services\CustomerServiceInterface;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerServiceInterface $customerService) {
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customerService->all();
        return view('customers.index', compact($customers));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|max:100|unique:customers,email',
            'phone'    => 'nullable|string|max:45',
            'address'  => 'nullable|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $this->customerService->create($validated);

        return redirect()->route('customers.index')
                        ->with('success', 'Cliente cadastrado com sucesso!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = $this->customerService->find($id);
        return view('customers.show', compact('customer'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|max:100|unique:customers,email,'.$id.',customer_id',
            'phone'    => 'nullable|string|max:45',
            'address'  => 'nullable|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $this->customerService->update($id, $validated);

        return redirect()->route('customers.index')
                        ->with('success', 'Cliente atualizado com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $this->customerService->delete($customer->customer_id);
    }
}
