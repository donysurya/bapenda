<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Uptb;
use App\Models\Publication;
use App\Models\Realization;

class homeController extends Controller
{
    public function index() {
        $pegawai = Pegawai::all();
        $uptb = Uptb::all();
        $publikasi = Publication::all();
        $realisasi = Realization::all();
        return view('cms.home.index', compact('pegawai', 'uptb', 'publikasi', 'realisasi'));
    }
}
