<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AhliWaris;

class PerBulanController extends Controller
{
    public function index(Request $request) 
    {
        $bulan = $request->input('bulan'); // format: YYYY-MM

        if ($bulan) {
            $ahliwaris = AhliWaris::whereMonth('tanggal', date('m', strtotime($bulan)))
                                   ->whereYear('tanggal', date('Y', strtotime($bulan)))
                                   ->get();
        } else {
            $ahliwaris = AhliWaris::all();
        }

        return view('perbulan.index', compact('ahliwaris'));
    }
    
}
