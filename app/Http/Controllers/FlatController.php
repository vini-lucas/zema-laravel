<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Http\Controllers\Controller;
use App\Http\Requests\FlatRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flat = Flat::cursorPaginate(15);
        return view('flats.index', ['flats' => $flat]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('flats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FlatRequest $request)
    {
        try {
            Flat::create([
                'name' => $request->name,
                'description' => $request->description,
                'months_guarantee' => $request->months_guarantee
            ]);
            $flat = Flat::orderBy('id', 'DESC')->first();
            return redirect()->route('flats.show', ['flat' => $flat])->with('success', 'Plano cadastrada com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não cadastrado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('flats.index')->with('error', 'Plano não cadastrada com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Flat $flat)
    {
        return view('flats.show', ['flat' => $flat]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flat $flat)
    {
        return view('flats.edit', ['flat' => $flat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FlatRequest $request, Flat $flat)
    {
        try {
            $flat->update([
                'name' => $request->name,
                'description' => $request->description,
                'months_guarantee' => $request->months_guarantee
            ]);
            return redirect()->route('flats.show', ['flat' => $flat->id])->with('success', 'Edição realizada com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não editado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('flats.show', ['flat' => $flat->id])->with('error', 'Edição não realizada com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flat $flat)
    {
         try {
            $flat->delete();
            return redirect()->route('flats.index')->with('success', 'Exclusão realizada com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não excluído com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('flats.show', ['flat' => $flat->id])->with('error', 'Exclusão não realizada com sucesso!');
        }
    }
}
