<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realization;

class realizationController extends Controller
{
    public function index()
    {
        $realisasi = Realization::all();

        return view('landingpage.realisasi.index', compact('realisasi'));
    }

    public function show($id)
    {
        $realisasi = Realization::where('id', $id)->first();

        return view('landingpage.realisasi.show', compact('realisasi'));
    }
}
