<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $this->authService->register([
            'name' => $request->name,
            'email'=> $request->email,
            'password' => $request->password
        ]);

        return redirect()->route('dashboard');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($this->authService->login($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['email' => 'Credenciais inválidas!']);
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('login');
    }
}
