<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Branch;
use App\Models\EditedRecord;
use App\Models\Enterprise;
use App\Models\Flat;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:products.index')->only('index');
        $this->middleware('permission:products.create')->only(['create', 'store']);
        $this->middleware('permission:products.show')->only('show');
        $this->middleware('permission:products.edit')->only(['edit', 'update']);
        $this->middleware('permission:products.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->level_access_id == 1 || Auth::user()->level_access_id == 2) {
            $product = Product::cursorPaginate(15);
        } else if (Auth::user()->level_access_id == 3) {
            $product = Product::where('enterprise_name', Auth::user()->enterprise)->cursorPaginate(15);
        } else if (Auth::user()->level_access_id == 4) {
            $product = Product::where('branch', Auth::user()->branch_id)->cursorPaginate(15);
        } else {
            $product = Product::where('user', Auth::user()->id)->cursorPaginate(15);
        }
        return view('products.index', ['products' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->level_access_id == 1 || Auth::user()->level_access_id == 2) {
            $enterprises = Enterprise::get();
        } else {
            $enterprises = Enterprise::where('name', Auth::user()->enterprise)->get();
        }
        $flats = Flat::get();
        return view('products.create', ['enterprises' => $enterprises, 'flats' => $flats]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $enterprise_active = Enterprise::where('id', $request->enterprise_id)->first();
        $branch_active = Branch::where('id', Auth::user()->branch_id)->first();
        try {
            Product::create([
                'enterprise_id' => $request->enterprise_id,
                'description' => $request->description,
                'flat_id' => $request->flat_id,
                'months_guarantee' => $request->months_guarantee,
                'factory_price' => $request->factory_price,
                'enterprise_name' => $enterprise_active->name,
                'branch' => $branch_active->id,
                'user' => Auth::user()->id
            ]);
            $product = Product::orderBy('id', 'DESC')->first();
            return redirect()->route('products.show', ['product' => $product])->with('success', 'Produto cadastrado com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não cadastrado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('products.index')->with('error', 'Produto não cadastrado com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $enterprises = Enterprise::get();
        $flats = Flat::get();
        return view('products.edit', ['product' => $product, 'enterprises' => $enterprises, 'flats' => $flats]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $enterprise_active = Enterprise::where('id', $request->enterprise_id)->first();
        $branch_active = Branch::where('id', Auth::user()->branch_id)->first();
        try {
            EditedRecord::create([
                'table' => 'products',
                'id_register' => $product->id,
                'user' => Auth::user()->name . ' - ' . Auth::user()->cpf,
                'values_before' => [
                    'enterprise_id' => $product->enterprise_id,
                    'description' => $product->description,
                    'flat_id' => $product->flat_id,
                    'months_guarantee' => $product->months_guarantee,
                    'factory_price' => $product->factory_price
                ]
            ]);

            $product->update([
                'enterprise_id' => $request->enterprise_id,
                'description' => $request->description,
                'flat_id' => $request->flat_id,
                'months_guarantee' => $request->months_guarantee,
                'factory_price' => $request->factory_price,
                'enterprise_name' => $enterprise_active->name,
                'branch' => $branch_active->id
            ]);

            $editedRecordUpdate = EditedRecord::orderBy('id', 'DESC')->first();
            $editedRecordUpdate->update([
                'values_after' => [
                    'enterprise_id' => $request->enterprise_id,
                    'description' => $request->description,
                    'flat_id' => $request->flat_id,
                    'months_guarantee' => $request->months_guarantee,
                    'factory_price' => $request->factory_price
                ]
            ]);
            return redirect()->route('products.show', ['product' => $product->id])->with('success', 'Edição realizada com sucesso!');
        } catch (Exception $e) {
            $register = EditedRecord::orderBy('id', 'DESC')->first();
            $register->delete();
            Log::notice('Registro não editado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('products.show', ['product' => $product->id])->with('error', 'Edição não realizada com sucesso!');
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
            Log::notice('Registro não excluído com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('products.show', ['product' => $product->id])->with('error', 'Exclusão não realizada com sucesso!');
        }
    }
}
