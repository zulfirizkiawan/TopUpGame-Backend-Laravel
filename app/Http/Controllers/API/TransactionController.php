<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\game;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function index(Request $request)
{
    $id = $request->input('id');

    if ($id) {
        $transaction = transaction::with(['user'])->find($id);

        if ($transaction)
            
            return response()->json([
                    'status' => 'success',
                    'data' => $transaction,
                ]);
        else
        return response()->json([
            'status' => 'failed',
            'data' => $transaction,
        ], 404);
    }
    
    $transaction = transaction::with(['user', 'game', 'bank'])->where('user_id', Auth::user()->id)->get();

    return response()->json([
            'status' => 'success',
            'data' => $transaction,
        ]);
   
}

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'game_id' => 'required|exists:games,id',
            'item' => 'required',
            'price' => 'required',
            'bank_id' => 'required',
            'status' => 'required',
        ]);

        $game = game::findOrFail($request->game_id);

        $transaction = new transaction([
            'user_id' => auth()->user()->id,
            'game_id' => $game->id,
            'item' => $request->item,
            'price' => $request->price,
            'bank_id' => $request->bank_id,
            'status' => $request->status,
        ]);

        $transaction->save();

        return response()->json([
            'message' => 'Transaction created successfully',
            'data' => $transaction
        ]);
    }
}
