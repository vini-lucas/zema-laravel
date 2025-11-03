<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use Exception;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Branch::cursorPaginate(15);
        return view('branchs.index', ['branch' => $branch]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enterprises = Branch::get();
        return view('branchs.create', ['enterprises' => $enterprises]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try {
            Branch::create([
                'store' => $request->store,
                'description' => $request->description,
                'flat' => $request->flat,
                'months_guarantee' => $request->months_guarantee,
                'factory_price' => $request->factory_price
            ]);
            $product = Branch::orderBy('id', 'DESC')->first();
            return redirect()->route('products.show', ['product' => $product])->with('success', 'Produto cadastrado com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('products.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $product)
    {
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $enterprises = Enterprise::get();
        return view('products.edit', ['product' => $product, 'enterprises' => $enterprises]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        try {
            $product->update([
                'store' => $request->store,
                'description' => $request->description,
                'flat' => $request->flat,
                'months_guarantee' => $request->months_guarantee,
                'factory_price' => $request->factory_price,
            ]);
            return redirect()->route('products.show', ['product' => $product->id])->with('success', 'Edição realizada com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('products.show', ['product' => $product->id])->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Exclusão realizada com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('products.show', ['product' => $product->id])->with('error', 'Exclusão não realizada com sucesso!');
        }
    }
}
