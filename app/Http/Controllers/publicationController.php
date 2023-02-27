<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;

class publicationController extends Controller
{
    public function index()
    {
        $perda = Publication::where('category', 'PERDA')->get();
        $perbup = Publication::where('category', 'PERBUP')->get();
        $document = Publication::where('category', 'Document')->get();

        return view('landingpage.download.index', compact('perda', 'perbup', 'document'));
    }
}
