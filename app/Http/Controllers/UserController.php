<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Branch;
use App\Models\EditedRecord;
use App\Models\Enterprise;
use App\Models\LevelAccess;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->level_access_id == 1) {
            $users = User::cursorPaginate(15);
        } elseif (Auth::user()->level_access_id == 2) {
            $users = User::where('level_access_id', '!=', 1)->cursorPaginate(15);
        } elseif (Auth::user()->level_access_id == 3) {
            $branch_active = Branch::where('id', Auth::user()->branch_id)->first();
            $enterprise_active = Enterprise::where('id', $branch_active->enterprise_id)->first();
            $users = User::where('level_access_id', '!=', 1)->where('level_access_id', '!=', 2)->where('enterprise', $enterprise_active->name)->cursorPaginate(15);
        } else {
            $branch_active = Branch::where('id', Auth::user()->branch_id)->first();
            $users = User::where('level_access_id', '!=', 1)->where('level_access_id', '!=', 2)->where('level_access_id', '!=', 3)->where('branch_id', $branch_active->id)->cursorPaginate(15);;
        }
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'enterprise' => 'sometimes|not_in:null',
            'branch_id' => 'sometimes|not_in:null'
        ], [
            'enterprise.not_in' => 'Informe a empresa!',
            'branch_id.not_in' => 'Informe a filial!'
        ]);
        $branch_active = $request->branch_id;
        if (Auth::user()->level_access_id == 1) {
            $levels_access = LevelAccess::get();
        } else {
            $levels_access = LevelAccess::where('name', '!=', 'Desenvolvedor')->get();
        }
        return view('users.create', ['branch_active' => $branch_active, 'levels_access' => $levels_access]);
    }

    public function selectEnterprise()
    {
        if (Auth::user()->level_access_id == 1 || Auth::user()->level_access_id == 2) {
            $enterprises = Enterprise::get();
        } else {
            $branch_on = Branch::where('id', Auth::user()->branch_id)->first();
            $enterprises = Enterprise::where('id', $branch_on->enterprise_id)->get();
        }
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


    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $branch_active = Branch::where('id', $request->branch_id)->first();
        $enterprise_active = Enterprise::where('id', $branch_active->enterprise_id)->first();
        try {
            $newUser = User::create([
                'name' => $request->name,
                'cpf' => $request->cpf,
                'date_birth' => $request->date_birth,
                'gender' => $request->gender,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'password' => Hash::make($request->password),
                'enterprise' => $enterprise_active->name,
                'status_id' => 1,
                'branch_id' => $request->branch_id,
                'level_access_id' => $request->level_access_id
            ]);
            $array = [
                1 => 'Desenvolvedor',
                2 => 'Administrador',
                3 => 'Supervisor',
                4 => 'Gerente',
                5 => 'Vendedor',
                6 => 'Cliente'
            ];
            $newUser->assignRole($array[$request->level_access_id]);
            return redirect()->route('users.show', ['user' => $newUser])->with('success', 'Usuário cadastrado com sucesso!');
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
        $branch = Branch::where('id', $user->branch_id)->first();
        $enterprise = Enterprise::where('id', $branch->enterprise_id)->first();
        $status = Status::where('id', $user->status_id)->first();
        $level_access = LevelAccess::where('id', $user->level_access_id)->first();
        $cpf_array = str_split($user->cpf);
        $cpf = $cpf_array[0] . $cpf_array[1] . $cpf_array[2] . '.' . $cpf_array[3] . $cpf_array[4] . $cpf_array[5] . '.' . $cpf_array[6] . $cpf_array[7] . $cpf_array[8] . '-' . $cpf_array[9] . $cpf_array[10];
        $telephone_array = str_split($user->telephone);
        $telephone = '(' . $telephone_array[0] . $telephone_array[1] . ')' . ' ' . $telephone_array[2] . ' ' . $telephone_array[3] . $telephone_array[4] . $telephone_array[5] . $telephone_array[6] . '-' . $telephone_array[7] . $telephone_array[8] . $telephone_array[9] . $telephone_array[10];
        return view('users.show', ['user' => $user, 'enterprise' => $enterprise, 'level_access' => $level_access, 'status' => $status, 'cpf' => $cpf, 'telephone' => $telephone]);
    }

    /**
     * Carrega o formulário editar
     */
    public function edit(User $user)
    {
        $branch_active = Branch::where('id', $user->branch_id)->first();
        $enterprise_active = Enterprise::where('id', $branch_active->enterprise_id)->first();

        if (Auth::user()->level_access_id == 1) {
            $levels_access = LevelAccess::get();
        } elseif (Auth::user()->level_access_id == 2) {
            $levels_access = LevelAccess::where('name', '!=', 'Desenvolvedor')->get();
        } elseif (Auth::user()->level_access_id == 3) {
            $levels_access = LevelAccess::where('name', '!=', 'Desenvolvedor')->where('name', '!=', 'Administrador')->get();
        } else {
            $levels_access = LevelAccess::where('name', '!=', 'Desenvolvedor')->where('name', '!=', 'Administrador')->where('name', '!=', 'Supervisor')->get();
        }
        return view('users.edit', ['user' => $user, 'enterprise_active' => $enterprise_active, 'levels_access' => $levels_access]);
    }

    public function selectEnterpriseUpdate(User $user)
    {
        if (Auth::user()->level_access_id == 1 || Auth::user()->level_access_id == 2) {
            $branch_active = Branch::where('id', $user->branch_id)->first();
            $enterprise_active = Enterprise::where('id', $branch_active->enterprise_id)->first();
            $enterprises = Enterprise::get();
        } else {
            $branch_active = Branch::where('id', Auth::user()->branch_id)->first();
            $enterprise_active = Enterprise::where('id', $branch_active->enterprise_id)->first();
            $enterprises = Enterprise::where('id', $enterprise_active->id)->get();
        }
        return view('users.select-enterprise-update', ['enterprises' => $enterprises, 'user' => $user, 'enterprise_active' => $enterprise_active]);
    }

    public function selectEnterpriseActiveUpdate(Request $request, User $user)
    {
        $validated = $request->validate([
            'enterprise' => 'not_in:null',
            'branch_id' => 'sometimes|not_in:null'
        ], [
            'enterprise.not_in' => 'Informe a empresa!',
            'branch_id.not_in' => 'Informe a filial!'
        ]);
        if (Auth::user()->level_access_id == 1 || Auth::user()->level_access_id == 2 || Auth::user()->level_access_id == 3) {
            $branches = Branch::where('enterprise_id', $request->enterprise)->get();
            $enterprise_active = Enterprise::where('id', $request->enterprise)->first();
        } else {
            $branches = Branch::where('id', Auth::user()->branch_id)->get();
            $enterprise_active = Enterprise::where('id', $request->enterprise)->first();
        }
        return view('users.select-branch-update', ['enterprise_active' => $enterprise_active, 'branches' => $branches, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $branch_active = Branch::where('id', $request->branch_id)->first();
        $enterprise_active = Enterprise::where('id', $branch_active->enterprise_id)->first();
        $validated = $request->validate([
            'branch_id' => 'sometimes|not_in:null'
        ], [
            'branch_id.not_in' => 'A filial da empresa precisa ser informada!'
        ]);
        try {
            EditedRecord::create([
                'table' => 'users',
                'id_register' => $user->id,
                'user' => Auth::user()->name . ' - ' . Auth::user()->cpf,
                'values_before' => [
                    'name' => $user->name,
                    'date_birth' => $user->date_birth,
                    'gender' => $user->gender,
                    'email' => $user->email,
                    'telephone' => $user->telephone,
                    'branch_id' => $user->branch_id,
                    'status_id' => $user->status_id,
                    'level_access_id' => $user->level_access_id
                ]
            ]);

            $user->update([
                'name' => $request->name,
                'date_birth' => $request->date_birth,
                'gender' => $request->gender,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'enterprise' => $enterprise_active->name,
                'branch_id' => $request->branch_id,
                'status_id' => $request->status_id,
                'level_access_id' => $request->level_access_id
            ]);
            $array = [
                1 => 'Desenvolvedor',
                2 => 'Administrador',
                3 => 'Supervisor',
                4 => 'Gerente',
                5 => 'Vendedor',
                6 => 'Cliente'
            ];
            $user->assignRole($array[$request->level_access_id]);

            $editedRecordUpdate = EditedRecord::orderBy('id', 'DESC')->first();
            $editedRecordUpdate->update([
                'values_after' => [
                    'name' => $request->name,
                    'date_birth' => $request->date_birth,
                    'gender' => $request->gender,
                    'email' => $request->email,
                    'telephone' => $request->telephone,
                    'branch_id' => $request->branch_id,
                    'status_id' => $request->status_id,
                    'level_access_id' => $request->level_access_id
                ]
            ]);
            return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Edição realizada com sucesso!');
        } catch (Exception $e) {
            $register = EditedRecord::orderBy('id', 'DESC')->first();
            $register->delete();
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
