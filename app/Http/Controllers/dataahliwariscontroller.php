<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataahliwaris;
use Illuminate\Support\Facades\Storage;

class dataahliwariscontroller extends Controller
{
    public function index()
    {
        $dataahliwaris = Dataahliwaris::paginate(10);
        return view('dataahliwaris.index', compact('dataahliwaris'));
    }

    public function create()
    {
        return view('dataahliwaris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ahliwaris' => 'required|string|max:255',
            'nama_pewaris' => 'required|string|max:255',
            'hubungan_keluarga' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        $path = null;

        if ($request->hasFile('dokumen')) {
            $path = $request->file('dokumen')->store('dokumen', 'public');
        }

        dataahliwaris::create([
            'user_id' => auth()->id(),
            'nama_ahliwaris' => $request->nama_ahliwaris,
            'nama_pewaris' => $request->nama_pewaris,
            'hubungan_keluarga' => $request->hubungan_keluarga,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'dokumen' => $path,
        ]);

        return redirect()->route('dataahliwaris.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $dataahliwaris = Dataahliwaris::findOrFail($id);
        return view('dataahliwaris.Edit', compact('dataahliwaris'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_ahliwaris' => 'required|string|max:255',
            'nama_pewaris' => 'required|string|max:255',
            'hubungan_keluarga' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        $data = dataahliwaris::findOrFail($id);

        if ($request->hasFile('dokumen')) {
            if ($data->dokumen && Storage::disk('public')->exists($data->dokumen)) {
                Storage::disk('public')->delete($data->dokumen);
            }
            $path = $request->file('dokumen')->store('dokumen', 'public');
        } else {
            $path = $data->dokumen;
        }

        $data->update([
            'nama_ahliwaris' => $request->nama_ahliwaris,
            'nama_pewaris' => $request->nama_pewaris,
            'hubungan_keluarga' => $request->hubungan_keluarga,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'dokumen' => $path,
        ]);

        return redirect()->route('dataahliwaris.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $data = dataahliwaris::findOrFail($id);

        if ($data->dokumen && Storage::disk('public')->exists($data->dokumen)) {
            Storage::disk('public')->delete($data->dokumen);
        }

        $data->delete();

        return redirect()->route('dataahliwaris.index')->with('success', 'Data berhasil dihapus');
    }
}
