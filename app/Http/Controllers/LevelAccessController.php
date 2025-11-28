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
        return view('statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'sometimes|required|unique:statuses',
                'description' => 'sometimes|required|unique:statuses'
            ]);
            Status::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            $new_status = Status::orderBy('id', 'DESC')->first();
            return redirect()->route('statuses.show', ['status' => $new_status])->with('success', 'Status cadastrado com sucesso!');
        } catch (Exception $e) {
            Log::notice('Status não cadastrado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('statuses.index')->with('error', 'Status não cadastrado com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LevelAccess $level_access)
    {
        return view('levels_access.show', ['levels_access' => $level_access]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LevelAccess $level_access)
    {
        return view('levels_access.edit', ['levels_access' => $level_access]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LevelAccess $level_access)
    {
        try {
            $validation = $request->route('level_access');
            $validated = $request->validate([
                'name' => 'sometimes|required|unique:statuses,name,' . ($validation ? $validation->id : null),
                'description' => 'sometimes|required|unique:statuses,name,' . ($validation ? $validation->id : null)
            ]);
            EditedRecord::create([
                'table' => 'levels_access',
                'id_register' => $level_access->id,
                'user' => Auth::user()->name . ' - ' . Auth::user()->cpf,
                'values_before' => [
                    'name' => $level_access->name,
                    'description' => $level_access->description
                ]
            ]);

            $level_access->update([
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

            return redirect()->route('levels_access.show', ['level_access' => $level_access->id])->with('success', 'Edição realizada com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não editado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('levels_access.show', ['level_access' => $level_access->id])->with('error', 'Edição não realizada com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        try {
            $status->delete();
            return redirect()->route('statuses.index')->with('success', 'Exclusão realizada com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não excluído com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('statuses.show', ['status' => $status->id])->with('error', 'Exclusão não realizada com sucesso!');
        }
    }
}
