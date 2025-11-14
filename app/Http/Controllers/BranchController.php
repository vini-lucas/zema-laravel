<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Http\Controllers\Controller;
use App\Http\Requests\BranchRequest;
use App\Models\EditedRecord;
use App\Models\Enterprise;
use Exception;
use Illuminate\Support\Facades\Log;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branchs = Branch::cursorPaginate(15);
        return view('branchs.index', ['branchs' => $branchs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enterprises = Enterprise::get();
        return view('branchs.create', ['enterprises' => $enterprises]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BranchRequest $request)
    {
        try {
            Branch::create([
                'cnpj' => $request->cnpj,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'city' => $request->city,
                'enterprise_id' => $request->enterprise_id
            ]);
            $branch = Branch::orderBy('id', 'DESC')->first();
            return redirect()->route('branchs.show', ['branch' => $branch])->with('success', 'Filial cadastrada com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não cadastrado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('branchs.index')->with('error', 'Filial não cadastrada com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        return view('branchs.show', ['branch' => $branch]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        $enterprise = Enterprise::where('id', $branch->enterprise_id)->first();
        return view('branchs.edit', ['branch' => $branch, 'enterprise' => $enterprise]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BranchRequest $request, Branch $branch)
    {
        try {
            EditedRecord::create([
                'table' => 'branchs',
                'id_register' => $branch->id,
                'user' => 'validar futuramente',
                'values_before' => [
                    'cnpj' => $branch->cnpj,
                    'email'=> $branch->email,
                    'telephone'=> $branch->telephone,
                    'city'=> $branch->city,
                    'enterprise_id' => $branch->enterprise_id,
                ]
            ]);
            
            $branch->update([
                'cnpj' => $request->cnpj,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'city' => $request->city,
                'enterprise_id' => $request->enterprise_id,
            ]);

            $editedRecordUpdate = EditedRecord::orderBy('id', 'DESC')->first();
            $editedRecordUpdate->update([
                'values_after' => [
                    'cnpj' => $request->cnpj,
                    'email' => $request->email,
                    'telephone' => $request->telephone,
                    'city' => $request->city,
                    'enterprise_id' => $branch->enterprise_id,
                ]
            ]);

            return redirect()->route('branchs.show', ['branch' => $branch->id])->with('success', 'Edição realizada com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não editado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('branchs.show', ['branch' => $branch->id])->with('error', 'Edição não realizada com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        try {
            $branch->delete();
            return redirect()->route('branchs.index')->with('success', 'Exclusão realizada com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não excluído com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('branchs.show', ['branch' => $branch->id])->with('error', 'Exclusão não realizada com sucesso!');
        }
    }
}
