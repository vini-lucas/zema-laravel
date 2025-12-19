<?php

namespace App\Http\Controllers;

use App\Models\Inss;
use App\Http\Controllers\Controller;
use App\Http\Requests\InssRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class InssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('inss.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inss.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InssRequest $request)
    {
        $cpf = preg_replace('/\D/', '', $request->cpf); // Aceita somente números.
        $telephone = preg_replace('/\D/', '', $request->telephone); // Aceita somente números.
        try {
            Inss::create([
                'cpf' => $cpf,
                'telephone' => $telephone,
                'name' => $request->name,
                'literate' => $request->literate,
                'date_birth' => $request->date_birth,
                'internship' => 1,
                'situation' => 'AGUARDANDO ANÁLISE',
                'possession' => 1,
                'observation' => 'Operação cadastrada com sucesso, aguardando a verificação de um analista para seu prosseguimento!',
            ]);
            return redirect()->route('inss.index')->with('success', 'Proposta cadastrada com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não cadastrado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('inss.index')->with('error', 'Proposta não cadastrada com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Inss $inss)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inss $inss)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InssRequest $request, Inss $inss)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inss $inss)
    {
        //
    }
}
