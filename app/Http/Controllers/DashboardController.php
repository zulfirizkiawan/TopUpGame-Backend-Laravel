<?php

namespace App\Http\Controllers;

use App\Models\bank;
use App\Models\game;
use App\Models\transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $gettransactions = transaction::whereIn('status', ['Pending', 'Processed'])->get();

        $transactions = transaction::count();
        $users = User::where('roles', '=', 'PLAYER')->count();
        $games = game::count();
        $banks = bank::count();

        return view('dashboard', compact('users', 'transactions', 'users', 'games', 'banks', 'gettransactions'));

        
        // return view('transaction.index', ['transactions' => $transactions]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
