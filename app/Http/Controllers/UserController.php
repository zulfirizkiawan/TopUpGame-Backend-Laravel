<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::find($id);
        return view('user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phoneNumber' => 'required',
            'profilePhotoPath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096'
        ]);
    
        $users = User::findOrFail($id);
        $data = $request->all();
    
        if ($request->hasFile('profilePhotoPath')) {
            $data['profilePhotoPath'] = $request->file('profilePhotoPath')->store('assets/user', 'public');
        }
    
        $users->update($data);
    
        return redirect()->route('user')->with('success', 'User berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
