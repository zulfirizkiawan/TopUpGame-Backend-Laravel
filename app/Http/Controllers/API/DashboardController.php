<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function getTotalTransactionByCategory(Request $request)
{
    $userId = Auth::id();
    $category = $request->input('category');

    $transactions = transaction::where('user_id', $userId)
        ->whereHas('game', function($query) use ($category) {
            $query->where('category', $category);
        })
        ->get();

    $price = 0;
    foreach ($transactions as $transaction) {
        $price += $transaction->price;
    }

    return response()->json([
        'status' => 'success',
        'data' => [
            'price' => $price,
            'category' => $category
        ]
    ]);
}

// public function getTransaction()
// {
//     $category = $request->input('category');
//     $transactions = transaction::where('status', 'pending')->get();

//     return response()->json([
//         'status' => 'success',
//         'data' => $transactions,
//     ]);
// }

public function getStatusTransaction(Request $request, $status)
{
    $user = Auth::user();
    $transactions = Transaction::where('user_id', $user->id)
        ->where('status', $status)
        ->with('game', 'user')
        ->get();

    return response()->json([
        'status' => 'success',
        'data' => $transactions,
    ]);
}

}
