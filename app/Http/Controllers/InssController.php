<?php

namespace App\Http\Controllers;

use App\Models\Inss;
use App\Http\Controllers\Controller;
use App\Http\Requests\InssRequest;
use App\Models\Enterprise;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class InssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enterprise_active = Enterprise::where('name', Auth::user()->enterprise)->first();
        (Auth::user()->level_access_id == 1 || Auth::user()->level_access_id == 2) ? $proposals = Inss::get() : ((Auth::user()->level_access_id == 3) ? $proposals = Inss::where('enterprise_id', $enterprise_active->id)->get() : (Auth::user()->level_access_id == 4 ? $proposals = Inss::where('branch_id', Auth::user()->branch_id)->get() : $proposals = Inss::where('seller_cpf', Auth::user()->cpf)->get()));
        return view('inss.index', ['proposals' => $proposals]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InssRequest $request)
    {
        $cpf = preg_replace('/\D/', '', $request->cpf); // Aceita somente números.
        $telephone = preg_replace('/\D/', '', $request->telephone); // Aceita somente números.
        $enterprise_active = Enterprise::where('name', Auth::user()->enterprise)->first();
        $request->observation == '' ? $request->observation = 'SEM OBSERVAÇÃO' : $request->observation;
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
                'instruction' => 'Operação cadastrada com sucesso, aguardando a verificação de um analista para seu prosseguimento!',
                'observation' => $request->observation,
                'user_id' => Auth::id(),
                'branch_id' => Auth::user()->branch_id,
                'enterprise_id' => $enterprise_active->id,
                'seller_cpf' => Auth::user()->cpf
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
