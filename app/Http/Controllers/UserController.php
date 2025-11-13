<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Branch;
use App\Models\EditedRecord;
use App\Models\Enterprise;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

    public function infoCreate(Request $request)
    {
        $validated = $request->validate([
            'enterprise' => 'sometimes|not_in:null',
            'branch_id' => 'sometimes|not_in:null'
        ], [
            'enterprise.not_in' => 'Informe a empresa!',
            'branch_id.not_in' => 'Informe a filial!'
        ]);
        $branch_active = $request->branch_id;
        return $this->create($branch_active);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($branch_active)
    {
        return view('users.create', ['branch_active' => $branch_active]);
    }

    public function selectEnterprise()
    {
        $enterprises = Enterprise::get();
        return view('users.select-enterprise', ['enterprises' => $enterprises]);
    }

    public function selectEnterpriseActive(Request $request)
    {
        $validated = $request->validate([
            'enterprise' => 'not_in:null',
            'branch_id' => 'sometimes|not_in:null'
        ], [
            'enterprise.not_in' => 'Informe a empresa!',
            'branch_id.not_in' => 'Informe a filial!'
        ]);

        $branches = Branch::where('enterprise_id', $request->enterprise)->get();
        $enterprise_active = Enterprise::where('id', $request->enterprise)->first();
        return view('users.select-branch', ['enterprise_active' => $enterprise_active, 'branches' => $branches]);
    }

    public function selectBranch()
    {
        $enterprises = Enterprise::get();
        return view('users.select-branch', ['enterprises' => $enterprises]);
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
                'status' => 'Ativo',
                'branch_id' => $request->branch_id
            ]);
            $user = User::orderBy('id', 'DESC')->first();
            return redirect()->route('users.show', ['user' => $user])->with('success', 'Usuário cadastrado com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não cadastrado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('users.index')->with('error', 'Usuário não cadastrado com sucesso!');
        }
    }

    /**
     * Carrega os detalhes do usuário
     */
    public function show(User $user)
    {
        $enterprise = Enterprise::where('id', $user->branch_id)->first();
        return view('users.show', ['user' => $user, 'enterprise' => $enterprise]);
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
            EditedRecord::create([
                'table' => 'users',
                'id_register' => $user->id,
                'user' => 'validar futuramente',
                'values_before' => [
                    'name' => $user->name,
                    'date_birth' => $user->date_birth,
                    'gender' => $user->gender,
                    'email' => $user->email,
                    'telephone' => $user->telephone
                ]
            ]);

            $user->update([
                'name' => $request->name,
                'date_birth' => $request->date_birth,
                'gender' => $request->gender,
                'email' => $request->email,
                'telephone' => $request->telephone,
            ]);

            $editedRecordUpdate = EditedRecord::orderBy('id', 'DESC')->first();
            $editedRecordUpdate->update([
                'values_after' => [
                    'name' => $request->name,
                    'date_birth' => $request->date_birth,
                    'gender' => $request->gender,
                    'email' => $request->email,
                    'telephone' => $request->telephone
                ]
            ]);

            return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Edição realizada com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não editado com sucesso.', ['exception' => $e->getMessage()]);
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
            Log::notice('Senha não editada com sucesso.', ['exception' => $e->getMessage()]);
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
            Log::notice('Registro não excluído com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('users.show', ['user' => $user->id])->with('error', 'Exclusão não realizada com sucesso!');
        }
    }
}
