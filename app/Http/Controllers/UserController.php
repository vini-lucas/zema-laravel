<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::cursorPaginate(15);
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'cpf' => $request->cpf,
                'date_birth' => $request->date_birth,
                'gender' => $request->gender,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'password' => Hash::make($request->password),
                'status' => 'ativo'
            ]);
            $user = User::orderBy('id', 'DESC')->first();
            return redirect()->route('users.show', ['user' => $user])->with('success', 'Usuário cadastrado com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('users.index')->with('error', 'Usuário não cadastrado com sucesso!');
        }
    }

    /**
     * Carrega os detalhes do usuário
     */
    public function show(User $user)
    {
        $user = User::where('id', $user->id)->first();
        return view('users.show', ['user' => $user]);
    }

    /**
     * Carrega o formulário editar
     */
    public function edit(User $user)
    {
        $user = User::where('id', $user->id)->first();
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        try {
            $user->update([
                'name' => $request->name,
                'date_birth' => $request->date_birth,
                'gender' => $request->gender,
                'email' => $request->email,
                'telephone' => $request->telephone,
            ]);
            return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Edição realizada com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('users.show', ['user' => $user->id])->with('error', 'Edição não realizada com sucesso!');
        }
    }

    // Carregar formulário editar senha
    public function editPassword(User $user)
    {
        $user = User::where('id', $user->id)->first();
        return view('users.edit-password', ['user' => $user]);
    }

    // Editar a senha
    public function updatePassword(UserRequest $request, User $user)
    {
        try {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Edição realizada com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Edição não realizada com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Exclusão realizada com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('users.show', ['user' => $user->id])->with('error', 'Exclusão não realizada com sucesso!');
        }
    }
}
