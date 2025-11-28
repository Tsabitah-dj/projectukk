<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataahliwaris;

class dataahliwariscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dataahliwaris = dataahliwaris::paginate(10);
        return view('dataahliwaris.index', compact('dataahliwaris')); 

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dataahliwaris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $request->validate([
            'nama_alm' => 'required|string|max:255',
            'nama_pewaris' => 'required|string|max:255',
            'hubungan_keluarga' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
          ]);
          
            dataahliwaris::create([
                'nama_alm' => $request->nama_alm,
                'nama_pewaris' => $request->nama_pewaris,
                'hubungan_keluarga'=> $request->hubungan_keluarga,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
            ]);

            return redirect()->route('dataahliwaris.index')->with ('success', 'Data berhasil ditambahkan');
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
        //
        $dataahliwaris = \App\Models\Dataahliwaris::findOrFail($id);
        return view('dataahliwaris.edit', compact('dataahliwaris'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $request->validate([
        'nama_alm' => 'required|string|max:255',
        'nama_pewaris' => 'required|string|max:255',
        'hubungan_keluarga' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required|string|max:255',
    ]);

    DataAhliWaris::findOrFail($id)->update([
        'nama_alm' => $request->nama_alm,
        'nama_pewaris' => $request->nama_pewaris,
        'hubungan_keluarga' => $request->hubungan_keluarga,
        'tanggal_lahir' => $request->tanggal_lahir,
        'alamat' => $request->alamat,
    ]);

    return redirect()->route('dataahliwaris.index')->with('success', 'Data berhasil diupdate');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $dataahliwaris = dataahliwaris::findOrFail($id);
        $dataahliwaris->delete();

        return redirect()->route('dataahliwaris.index')->with('success', 'Data berhasil dihapus');

    }
}
