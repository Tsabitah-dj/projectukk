<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ahliwaris;

class ahliwariscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ahliwaris = ahliwaris::paginate(10);
        return view('layout.app', compact('ahliwaris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        return view('Ahli waris.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
// Validasi input termasuk file gambar
    $request->validate([
        'nama_pemohon' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'no_register' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'bukti_register' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',  // Validasi file gambar
    ]);

    // Cek apakah ada file yang di-upload
    $fotoPath = null; // Set default null jika tidak ada file yang di-upload
    if ($request->hasFile('bukti_register')) {
        $foto = $request->file('bukti_register');
        // Menyimpan foto di folder 'bukti_register' di storage
        $fotoPath = $foto->store('bukti_register', 'public');
    }

    // Simpan data ke database
    AhliWaris::create([
        'nama_pemohon' => $request->nama_pemohon,
        'tanggal' => $request->tanggal,
        'no_register' => $request->no_register,
        'alamat' => $request->alamat,
        'bukti_register' => $fotoPath,  // Menyimpan path file gambar
    ]);


        return redirect()->route('dashboard')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ahliwaris = ahliwaris::findOrFail($id);
        return view('Ahli waris.Show', compact('ahliwaris'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ahliwaris = ahliwaris::findOrFail($id);
        return view('Ahli waris.Edit', compact('ahliwaris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pemohon' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'no_register' => "required|string|unique:ahliwaris,no_register,{$id}",
            'alamat' => 'required|string',
            'bukti_register' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $ahliwaris = ahliwaris::findOrFail($id);
        $ahliwaris->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ahliwaris = ahliwaris::findOrFail($id);
        $ahliwaris->delete();

        return redirect()->route('dashboard')->with('success', 'Data berhasil dihapus.');
    }
}
