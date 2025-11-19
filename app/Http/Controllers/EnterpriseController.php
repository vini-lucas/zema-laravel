<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use App\Http\Controllers\Controller;
use App\Http\Requests\EnterpriseRequest;
use App\Models\EditedRecord;
use App\Models\Status;
use Exception;
use Illuminate\Support\Facades\Log;

class EnterpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enterprise = Enterprise::cursorPaginate(15);
        return view('enterprises.index', ['enterprises' => $enterprise]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('enterprises.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EnterpriseRequest $request)
    {
        try {
            Enterprise::create([
                'name' => $request->name,
                'website' => $request->website,
                'status' => 'ativo',
                'logo' => $request->logo,
                'email' => $request->email
            ]);
            $enterprise = Enterprise::orderBy('id', 'DESC')->first();
            return redirect()->route('enterprises.show', ['enterprise' => $enterprise])->with('success', 'Empresa cadastrada com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não cadastrado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('enterprises.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Enterprise $enterprise)
    {
        $enterprise = Enterprise::where('id', $enterprise->id)->first();
        $status = Status::where('id', $enterprise->status_id)->first();
        return view('enterprises.show', ['enterprise' => $enterprise, 'status' => $status]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enterprise $enterprise)
    {
        $enterprise = Enterprise::where('id', $enterprise->id)->first();
        return view('enterprises.edit', ['enterprise' => $enterprise]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EnterpriseRequest $request, Enterprise $enterprise)
    {
        try {
            EditedRecord::create([
                'table' => 'enterprises',
                'id_register' => $enterprise->id,
                'user' => 'validar futuramente',
                'values_before' => [
                    'name' => $enterprise->name,
                    'website'=> $enterprise->website,
                    'status'=> $enterprise->status,
                    'email'=> $enterprise->email,
                    'logo' => $enterprise->logo,
                ]
            ]);
            
            $enterprise->update([
                'name' => $request->name,
                'website' => $request->website,
                'status' => $request->status,
                'email' => $request->email,
                'logo' => $request->logo,
            ]);

            $editedRecordUpdate = EditedRecord::orderBy('id', 'DESC')->first();
            $editedRecordUpdate->update([
                'values_after' => [
                    'name' => $request->name,
                    'website' => $request->website,
                    'status' => $request->status,
                    'email' => $request->email,
                    'logo' => $request->logo,
                ]
            ]);

            return redirect()->route('enterprises.show', ['enterprise' => $enterprise->id])->with('success', 'Edição realizada com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não editado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('enterprises.show', ['enterprise' => $enterprise->id])->with('error', 'Edição não realizada com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enterprise $enterprise)
    {
         try {
            $enterprise->delete();
            return redirect()->route('enterprises.index')->with('success', 'Exclusão realizada com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não excluído com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('enterprises.show', ['enterprise' => $enterprise->id])->with('error', 'Exclusão não realizada com sucesso!');
        }
    }
}
