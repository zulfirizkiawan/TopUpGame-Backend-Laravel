<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = game::all();
        return view('game.index', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('game.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GameRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('gamePhotoPath')) {
            $data['gamePhotoPath'] = $request->file('gamePhotoPath')->store('assets/game', 'public');
        }
    
        game::create($data);
    
        return redirect()->route('game')->with('success', 'Data nominal berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $games = game::findOrFail($id);
        return view('game.detail', compact('games'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $games = game::find($id);
        return view('game.edit', compact('games'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'gameName' => 'required',
            'category' => 'required',
            'nominal_id' => 'required',
            'status' => 'required',
            'gamePhotoPath' => 'image|mimes:jpeg,png,jpg,gif|max:4096'
        ]);
    
        $game = game::findOrFail($id);
        $data = $request->all();
    
        if ($request->hasFile('gamePhotoPath')) {
            $data['gamePhotoPath'] = $request->file('gamePhotoPath')->store('assets/game', 'public');
        }
    
        $game->update($data);
    
        return redirect()->route('game')->with('success', 'Game berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $data = game::find($id);
        $data->delete();
        return redirect('game')->with('success', 'Data deleted successfully');
    }
}
