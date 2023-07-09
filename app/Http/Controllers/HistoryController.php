<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Http\Requests\StoreHistoryRequest;
use App\Http\Requests\UpdateHistoryRequest;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $history = History::where('id_user', Auth::user()->id_user)->get();
        $data = [];
        $data["history"] = $history;

        return view('history.index', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(History $history)
    {
        $history = History::all();
        return view('dashboard.index', compact('history'));
    }
}
