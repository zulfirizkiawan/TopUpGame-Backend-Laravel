<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\bank;
use App\Models\game;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $games = game::all();

        return response()->json([
            'success' => true,
            'data' => $games
        ]);
    }

    public function detail($id)
    {
        $games = game::with('nominal')->find($id);

        return response()->json([
            'success' => true,
            'data' => $games
        ]);
    }

    public function bank()
    {
        $banks = bank::all();

        return response()->json([
            'success' => true,
            'data' => $banks
        ]);
    }
}
