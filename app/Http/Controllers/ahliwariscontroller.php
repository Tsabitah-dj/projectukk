<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ahliwaris;

class ahliwariscontroller extends Controller
{
    public function index()
    {
        $ahliwaris = ahliwaris::paginate(10);
        return view('ahliwaris.index', compact('ahliwaris'));
    }

    public function create()
    {
        return view('ahliwaris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemohon' => 'required|string|max:255',
            'nama_alm' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'no_register' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'bukti_register' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('bukti_register')) {
            $fotoPath = $request->file('bukti_register')->store('bukti_register', 'public');
        }

        ahliwaris::create([
            'nama_pemohon' => $request->nama_pemohon,
            'nama_alm' => $request->nama_alm,
            'tanggal' => $request->tanggal,
            'no_register' => $request->no_register,
            'alamat' => $request->alamat,
            'bukti_register' => $fotoPath,
        ]);

        return redirect()->route('ahliwaris.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $ahliwaris = ahliwaris::findOrFail($id);
        return view('ahliwaris.show', compact('ahliwaris'));
    }

    public function edit(string $id)
    {
        $ahliwaris = ahliwaris::findOrFail($id);
        return view('ahliwaris.edit', compact('ahliwaris'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pemohon' => 'required|string|max:255',
            'nama_alm' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'no_register' => "required|string|unique:ahliwaris,no_register,{$id}",
            'alamat' => 'required|string',
            'bukti_register' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $ahliwaris = ahliwaris::findOrFail($id);

        $ahliwaris->update($request->all());

        return redirect()->route('ahliwaris.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $ahliwaris = ahliwaris::findOrFail($id);
        $ahliwaris->delete();

        return redirect()->route('ahliwaris.index')->with('success', 'Data berhasil dihapus.');
    }

    public function dashboard()
    {
        $totalSurat = ahliwaris::count();
        $suratBulanIni = ahliwaris::whereMonth('created_at', now()->month)
                               ->whereYear('created_at', now()->year)
                               ->count();
        $suratTahunIni = ahliwaris::whereYear('created_at', now()->year)->count();
        $totalAhliWaris = ahliwaris::distinct('nama_pemohon')->count();

        return view('dashboard', compact('totalSurat', 'suratBulanIni', 'suratTahunIni', 'totalAhliWaris'));
    }
}


