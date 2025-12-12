<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\Branch;
use App\Models\Enterprise;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function create()
    {
        return view('auth.create');
    }

    public function store(UserRequest $request)
    {
        $branch_active = Branch::where('id', $request->branch_id)->first();
        $enterprise_active = Enterprise::where('id', $branch_active->enterprise_id)->first();
        try {
            $newUser = User::create([
                'name' => $request->name,
                'cpf' => $request->cpf,
                'date_birth' => $request->date_birth,
                'gender' => $request->gender,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'password' => Hash::make($request->password),
                'enterprise' => $enterprise_active->name,
                'status_id' => 3,
                'branch_id' => 4,
                'level_access_id' => 6
            ]);
            $newUser->assignRole('Cliente');
            return redirect()->route('login')->with('success', 'Usuário cadastrado com sucesso. Agora, para obter o acesso, realize a confirmação do login!');
        } catch (Exception $e) {
            Log::notice('Registro não cadastrado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('users.index')->with('error', 'Usuário não cadastrado com sucesso!');
        }
    }

    public function recover()
    {
        return view('auth.recover');
    }

    public function storeRecover(Request $request)
    {
        $request->validate([
            'cpf' => 'required'
        ]);
        try {
            $user = User::where('cpf', $request->cpf)->first();

            $email_clear = explode('@', $user->email);
            $end_three = substr($email_clear[0], -3);
            $string = '****' . $end_three . '@' . $email_clear[1];

            if ($user != null) {
                return redirect()->route('login')->with('success', 'Um e-mail com os passos para recuperação de senha foi enviado à ' . $string . '.');
            } else {
                return redirect()->route('login')->with('success', 'Este CPF não possui acesso em nossa plataforma. Cadastre-se!');
            }
        } catch (Exception $e) {
            $email_clear = explode('@', $user->email);
            $end_three = substr($email_clear[0], -3);
            $string = '****' . $end_three . '@' . $email_clear[1];
            if ($user != null) {
                return redirect()->route('login')->with('success', 'Um e-mail com os passos para recuperação de senha foi enviado à ' . $string . '.');
            } else {
                return redirect()->route('login')->with('success', 'Este CPF não possui acesso em nossa plataforma. Cadastre-se!');
            }
        }
    }
}
