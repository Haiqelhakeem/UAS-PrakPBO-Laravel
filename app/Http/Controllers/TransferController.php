<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\History;
use App\Models\User;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    // Disini fungsi utama dashboard
    public function localTransfer()
    {
        $id_user = Auth::user()->id_user;
        $balance = Balance::where('balance.id_user', $id_user)->join('users', function (JoinClause $join) {
            $join->on('users.id_user', 'balance.id_user');
        })->get();

        // pembuatan variabel untuk foreach agar bisa dipanggil di view
        $data = [];
        $data["balance"] = $balance;

        return view('dashboard.index', $data);
    }

    //logic untuk transfer sesama bank
    public function transferForm(Request $request)
    {
        $id_user = Auth::user()->id_user;
        // $transfer = History::where('id_user', $id_user);

        // disini inputan form di ambil
        $recipient_credit = $request->recipient_credit;
        $amount = $request->amount;

        //menambah balance penerima
        $id_user_tujuan = User::where('no_rekening', $recipient_credit)->first();
        $get_balance_tujuan = Balance::where('id_user', $id_user_tujuan->id_user)->first();
        $get_balance_tujuan->balance = $get_balance_tujuan->balance + $request->amount;
        $get_balance_tujuan->save();

        $credentialsTujuan = [
            'id_user' => $id_user_tujuan,
            'recipient' => $id_user_tujuan->no_rekening,
            'amount' => $amount,
            'date' => date('Y-m-d')
        ];

        // mengurangi balance
        $get_balance = Balance::where('id_user', $id_user)->first();
        $get_balance->balance;
        $get_balance->balance = $get_balance->balance - $request->amount;
        $get_balance->save();


        //array dimana inputan siap dimasukan ke database
        $credentials = [
            'id_user' => $id_user,
            'recipient' => $recipient_credit,
            'amount' => $amount,
            'date' => date('Y-m-d')
        ];
        History::create($credentials);

        $balance = Balance::where('balance.id_user', $id_user)->join('users', function (JoinClause $join) {
            $join->on('users.id_user', 'balance.id_user');
        })->get();

        $data = [];
        $data["balance"] = $balance;
        return view('dashboard.index', $data);

    }
}