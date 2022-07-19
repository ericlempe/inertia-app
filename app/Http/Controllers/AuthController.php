<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrarRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Exception;

class AuthController extends Controller
{
    public function login()
    {
        return Inertia::render('Pages/Auth/Login');
    }

    public function registrar()
    {
        return Inertia::render('Pages/Auth/Registrar');
    }

    public function logar(LoginRequest $request)
    {
        try {
            if (auth()->attempt($request->all())) {
                return redirect()->route('home');
            }

            throw new Exception("Usuário ou senha inválidos");
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['email' => $e->getMessage()]);
        }
    }

    public function cadastrar(RegistrarRequest $request)
    {
        try {

            (new User())->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('login');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
