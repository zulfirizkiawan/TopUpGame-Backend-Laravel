<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankRequest;
use App\Models\bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banks = bank::all();
        return view('bank.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bank.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BankRequest $request)
    {
        $data = $request->all();

        bank::create($data);

        return redirect()->route('bank')->with('success', 'Data bank berhasil ditambahkan!');
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
        $banks = bank::find($id);
        return view('bank.edit', compact('banks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BankRequest $request, $id)
    {
        $banks = bank::find($id);
        $banks->ownerName = $request->input('ownerName');
        $banks->bankName = $request->input('bankName');
        $banks->accountNumber = $request->input('accountNumber');
        $banks->save();
        return redirect('bank')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = bank::find($id);
        $data->delete();
        return redirect('bank')->with('success', 'Data deleted successfully');
    }
}
