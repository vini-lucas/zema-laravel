<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function loginProccess(LoginRequest $request)
    {
        dd($request);
        try {
        } catch (Exception $e) {
            Log::notice('Login e/ou senha inválido(a).', ['Excessão' => $e->getMessage()]);
            return redirect()->back()->withInput()->with('error', 'CPF e/ou senha incorretos!');
        }
    }
}
