<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vision;
use App\Models\Mission;
use App\Models\History;
use App\Models\Director;
use App\Models\Structure;
use App\Models\address;
use App\Models\OfficeHour;

class aboutController extends Controller
{
    public function visi_misi()
    {
        $visi = Vision::orderBy('created_at', 'desc')->first();
        $misi = Mission::orderBy('created_at', 'desc')->first();
        $address = address::where('id', 1)->first();
        $officehours = OfficeHour::all();

        return view('landingpage.about.index', compact('visi', 'misi', 'address', 'officehours'));
    }

    public function sejarah()
    {
        $sejarah = History::orderBy('created_at', 'desc')->first();
        $address = address::where('id', 1)->first();
        $officehours = OfficeHour::all();

        return view('landingpage.about.history', compact('sejarah', 'address', 'officehours'));
    }

    public function kepala_bapenda()
    {
        $kepala = Director::orderBy('created_at', 'desc')->first();
        $address = address::where('id', 1)->first();
        $officehours = OfficeHour::all();

        return view('landingpage.about.director', compact('kepala', 'address', 'officehours'));
    }

    public function struktur_organisasi()
    {
        $struktur = Structure::orderBy('created_at', 'desc')->first();
        $address = address::where('id', 1)->first();
        $officehours = OfficeHour::all();

        return view('landingpage.about.structure', compact('struktur', 'address', 'officehours'));
    }
}
