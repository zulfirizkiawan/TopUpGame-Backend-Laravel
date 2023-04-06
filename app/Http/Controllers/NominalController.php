<?php

namespace App\Http\Controllers;

use App\Http\Requests\NominalRequest;
use App\Models\nominal;
use Illuminate\Http\Request;

class NominalController extends Controller
{
    public function index(Request $request)
    {
        $nominals = nominal::all();
        return view('nominal.index', compact('nominals'));
    }

    public function create()
    {
        return view('nominal.create');
    }

    public function store(NominalRequest $request)
    {
        $data = $request->all();

        nominal::create($data);

        return redirect()->route('nominal')->with('success', 'Data nominal berhasil ditambahkan!');
    
    }

    public function edit($id)
    {
        // return view('nominal.edit', [
        //     'item' => $nominal
        // ]);
        $nominals = nominal::find($id);
        return view('nominal.edit', compact('nominals'));
    }

    
    public function update(NominalRequest $request, $id)
    {
            $nominals = nominal::find($id);
            $nominals->coinName = $request->input('coinName');
            $nominals->amountCoin = $request->input('amountCoin');
            $nominals->coinPrice = $request->input('coinPrice');
            $nominals->save();
            return redirect('nominal')->with('success', 'Data updated successfully');
    }

    public function destroy($id)
    {
        $data = nominal::find($id);
        $data->delete();
        return redirect('nominal')->with('success', 'Data deleted successfully');
    }
}
