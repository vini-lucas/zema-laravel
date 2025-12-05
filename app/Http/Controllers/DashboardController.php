<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Enterprise;
use App\Models\LevelAccess;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
}
