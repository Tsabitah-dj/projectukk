<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AhliWaris;

class pertahuncontroller extends Controller
{
    //
     public function index(Request $request)
    {
        $tahun = $request->input('tahun'); // format YYYY

        if ($tahun) {
            $ahliwaris = AhliWaris::whereYear('tanggal', $tahun)->get();
        } else {
            $ahliwaris = AhliWaris::all();
        }

        return view('pertahun.index', compact('ahliwaris'));
    }

}