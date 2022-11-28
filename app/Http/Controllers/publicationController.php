<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;

class publicationController extends Controller
{
    public function index()
    {
        $publikasi = Publication::all();

        return view('landingpage.download.index', compact('publikasi'));
    }
}
