<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = transaction::all();
        return view('transaction.index', ['transactions' => $transactions]);
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
    public function show( $id)
    {
        $transactions = transaction::findOrFail($id);
        return view('transaction.detail', compact('transactions'));
    }

    public function accept($id)
    {
        $data = transaction::findOrFail($id);
        $data->status = 'Processed'; // ubah status sesuai dengan kebutuhan
        $data->save();
    
        return redirect()->back()->with('success', 'Data berhasil diupdate!');
    }

    public function tolak($id)
    {
        $data = transaction::findOrFail($id);
        $data->status = 'Failed'; // ubah status sesuai dengan kebutuhan
        $data->save();
    
        return redirect()->back()->with('success', 'Data berhasil diupdate!');
    }

    public function selesai($id)
    {
        $data = transaction::findOrFail($id);
        $data->status = 'Success'; // ubah status sesuai dengan kebutuhan
        $data->save();
    
        return redirect()->back()->with('success', 'Data berhasil diupdate!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
