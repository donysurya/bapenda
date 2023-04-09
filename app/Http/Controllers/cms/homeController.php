<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Uptb;
use App\Models\Publication;
use App\Models\Realization;
use App\Models\Background;

class homeController extends Controller
{
    public function index() {
        $pegawai = Pegawai::all();
        $uptb = Uptb::all();
        $publikasi = Publication::all();
        $realisasi = Realization::all();
        $background = Background::orderBy('active', 'DESC')->paginate(5);
        return view('cms.home.index', compact('pegawai', 'uptb', 'publikasi', 'realisasi', 'background'));
    }
}
