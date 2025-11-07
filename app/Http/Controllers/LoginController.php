<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function loginProccess(LoginRequest $request)
    {
        try {
            $authenticated = Auth::attempt([
                'cpf' => $request->cpf,
                'password' => $request->password
            ]);

            if (!$authenticated) {
                Log::notice('Login e/ou senha inválido(a).', ['CPF' => $request->cpf]);
                return redirect()->back()->withInput()->with('error', 'CPF e/ou senha incorretos!');
            } else {
                return redirect()->route('dashboard')->with('success', 'Bem-vindo de volta!');
            }
        } catch (Exception $e) {
            Log::notice('Login e/ou senha inválido(a).', ['Excessão' => $e->getMessage()]);
            return redirect()->back()->withInput()->with('error', 'CPF e/ou senha incorretos!');
        }
    }
}
