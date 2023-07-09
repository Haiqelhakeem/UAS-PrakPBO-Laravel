<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Users;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }

    public function balance()
    {
        $id_user = Auth::user()->id_user;
        $get_user = Balance::where('id_user', $id_user)->join('users', function (JoinClause $join) {
            $join->on('users.id_user', 'balance.id_user');
        })->get();

        $array_balance = [
            'balance' => $get_user,
        ];
        dd($array_balance);


        return view('dashboard.index');
    }
}