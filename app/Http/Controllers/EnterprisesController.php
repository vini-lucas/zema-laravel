<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EnterpriseModel;
use Exception;
use Illuminate\Http\Request;

class EnterprisesController extends Controller
{
    // Alistamento das empresas
    public function index()
    {
        return view('enterprises.index');
    }

    // Carrega o formulário
    public function create()
    {
        return view('enterprises.create');
    }

    // Recebe os dados do formolário e cadastra no banco de dados
    public function store(Request $request)
    {
        try {
            EnterpriseModel::create([
                'name' => $request->name,
                'cnpj' => $request->cnpj,
                'email' => $request->email,
                'telephone' => $request->telephone
            ]);
            return redirect()->route('enterprises.index')->with('success', 'Cadastro realizado com sucesso!');
        } catch (Exception $e) {
            dd($e);
        }
    }
}
