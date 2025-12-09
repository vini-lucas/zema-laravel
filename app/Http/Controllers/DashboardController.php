<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Branch;
use App\Models\EditedRecord;
use App\Models\Enterprise;
use App\Models\LevelAccess;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $nameInt = Auth::user()->name;
        $nameIntArray = explode(' ', $nameInt);
        $name = $nameIntArray[0];
        return view('dashboard.index', ['name' => $name]);
    }

    public function profile(User $user)
    {
        $branch = Branch::where('id', $user->branch_id)->first();
        $enterprise = Enterprise::where('id', $branch->enterprise_id)->first();
        $access = LevelAccess::where('id', $user->level_access_id)->first();
        $cpf_array = str_split($user->cpf);
        $cpf = $cpf_array[0] . $cpf_array[1] . $cpf_array[2] . '.' . $cpf_array[3] . $cpf_array[4] . $cpf_array[5] . '.' . $cpf_array[6] . $cpf_array[7] . $cpf_array[8] . '-' . $cpf_array[9] . $cpf_array[10];
        $telephone_array = str_split($user->telephone);
        $telephone = '(' . $telephone_array[0] . $telephone_array[1] . ')' . ' ' . $telephone_array[2] . ' ' . $telephone_array[3] . $telephone_array[4] . $telephone_array[5] . $telephone_array[6] . ' - ' . $telephone_array[7] . $telephone_array[8] . $telephone_array[9] . $telephone_array[10];
        return view('dashboard.profile', ['user' => $user, 'branch' => $branch, 'enterprise' => $enterprise, 'access' => $access, 'cpf' => $cpf, 'telephone' => $telephone]);
    }

    public function edit(User $user)
    {
        return view('dashboard.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'date_birth' => 'required|date|before:-18 years',
            'gender' => 'not_in:null',
            'email' => 'required|email',
            'telephone' => 'required'
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
                'branch_id' => $request->branch_id,
                'status_id' => $request->status_id,
                'level_access_id' => $request->level_access_id
            ]);

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
            return redirect()->route('profile', ['user' => $user->id])->with('success', 'Edição realizada com sucesso!');
        } catch (Exception $e) {
            $register = EditedRecord::orderBy('id', 'DESC')->first();
            $register->delete();
            Log::notice('Registro não editado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('users.show', ['user' => $user->id])->with('error', 'Edição não realizada com sucesso!');
        }
    }

    public function editPassword(User $user)
    {
        return view('dashboard.edit-password', ['user' => $user]);
    }

    public function updatePassword(UserRequest $request, User $user)
    {
        try {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('profile', ['user' => $user->id])->with('success', 'Edição realizada com sucesso!');
        } catch (Exception $e) {
            Log::notice('Senha não editada com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->back()->withInput()->with('error', 'Edição não realizada com sucesso!');
        }
    }
}
