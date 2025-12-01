<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Http\Controllers\Controller;
use App\Http\Requests\FlatRequest;
use App\Models\EditedRecord;
use App\Models\LevelAccess;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LevelAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels_access = LevelAccess::cursorPaginate(15);
        return view('levels_access.index', ['levels_access' => $levels_access]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('levels_access.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|unique:levels_access,name',
                'description' => 'required|unique:levels_access,description'
            ]);

            LevelAccess::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            $levels_access = LevelAccess::orderBy('id', 'DESC')->first();
            return redirect()->route('levels_access.show', ['levels_access' => $levels_access])->with('success', 'Nível de acesso cadastrado com sucesso!');
        } catch (Exception $e) {
            Log::notice('Nível de acesso não cadastrado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('levels_access.index')->with('error', 'Nível de acesso não cadastrado com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LevelAccess $levels_access)
    {
        return view('levels_access.show', ['levels_access' => $levels_access]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LevelAccess $levels_access)
    {
        return view('levels_access.edit', ['levels_access' => $levels_access]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LevelAccess $levels_access)
    {
        try {
            $validation = $request->route('levels_access');
            $validated = $request->validate([
                'name' => 'required|unique:levels_access,name,' . $levels_access->id,
                'description' => 'required|unique:levels_access,description,' . $levels_access->id
            ]);
            EditedRecord::create([
                'table' => 'levels_access',
                'id_register' => $levels_access->id,
                'user' => Auth::user()->name . ' - ' . Auth::user()->cpf,
                'values_before' => [
                    'name' => $levels_access->name,
                    'description' => $levels_access->description
                ]
            ]);

            $levels_access->update([
                'name' => $request->name,
                'description' => $request->description
            ]);

            $editedRecordUpdate = EditedRecord::orderBy('id', 'DESC')->first();
            $editedRecordUpdate->update([
                'values_after' => [
                    'name' => $request->name,
                    'description' => $request->description
                ]
            ]);

            return redirect()->route('levels_access.show', ['levels_access' => $levels_access->id])->with('success', 'Edição realizada com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não editado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('levels_access.show', ['levels_access' => $levels_access->id])->with('error', 'Edição não realizada com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LevelAccess $levels_access)
    {
        try {
            $levels_access->delete();
            return redirect()->route('levels_access.index')->with('success', 'Exclusão realizada com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não excluído com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('levels_access.show', ['levels_access' => $levels_access->id])->with('error', 'Exclusão não realizada com sucesso!');
        }
    }
}
