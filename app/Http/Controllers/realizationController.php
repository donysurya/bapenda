<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realization;
use App\Models\address;
use App\Models\OfficeHour;

class realizationController extends Controller
{
    public function index()
    {
        $realisasi = Realization::all();
        $address = address::where('id', 1)->first();
        $officehours = OfficeHour::all();

        return view('landingpage.realisasi.index', compact('realisasi', 'address', 'officehours'));
    }

    public function show($id)
    {
        $realisasi = Realization::where('id', $id)->first();
        $address = address::where('id', 1)->first();
        $officehours = OfficeHour::all();

        return view('landingpage.realisasi.show', compact('realisasi', 'address', 'officehours'));
    }
}
