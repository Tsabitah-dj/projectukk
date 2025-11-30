<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ahliwaris;
use App\Models\dataahliwaris;

class ahliwariscontroller extends Controller
{
    public function index()
    {
        $ahliwaris = ahliwaris::with('dataAhliWaris')->paginate(10);
        return view('ahliwaris.index', compact('ahliwaris'));
    }

    public function create()
    {
        $dataAhliWaris = dataahliwaris::all(); // ambil daftar ahli waris untuk dropdown
        return view('ahliwaris.create', compact('dataAhliWaris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dataahliwaris_id' => 'required|exists:dataahliwaris,id',
            'tanggal' => 'required|date',
            'no_register' => 'required|string|max:255|unique:ahliwaris,no_register',
            'alamat' => 'required|string|max:255',
        ]);

        ahliwaris::create([
            'dataahliwaris_id' => $request->dataahliwaris_id,
            'tanggal' => $request->tanggal,
            'no_register' => $request->no_register,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('ahliwaris.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $ahliwaris = ahliwaris::findOrFail($id);
        $dataAhliWaris = dataahliwaris::all();
        return view('ahliwaris.edit', compact('ahliwaris', 'dataAhliWaris'));
    }

    public function update(Request $request, string $id)
    {
        $ahliwaris = ahliwaris::findOrFail($id);

        $request->validate([
            'dataahliwaris_id' => 'required|exists:dataahliwaris,id',
            'tanggal' => 'required|date',
            'no_register' => "required|string|unique:ahliwaris,no_register,{$id}",
            'alamat' => 'required|string|max:255',
        ]);

        $ahliwaris->update([
            'dataahliwaris_id' => $request->dataahliwaris_id,
            'tanggal' => $request->tanggal,
            'no_register' => $request->no_register,
            'alamat' => $request->alamat,
        ]);

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
        $totalAhliWaris = ahliwaris::distinct('dataahliwaris_id')->count();

        return view('dashboard', compact('totalSurat', 'suratBulanIni', 'suratTahunIni', 'totalAhliWaris'));
    }
}
