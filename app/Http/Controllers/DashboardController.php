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
        return view('dashboard.profile', ['user' => $user, 'branch' => $branch, 'enterprise' => $enterprise, 'access' => $access]);
    }
}
