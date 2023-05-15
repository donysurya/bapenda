<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\address;
use App\Models\OfficeHour;

class publicationController extends Controller
{
    public function index()
    {
        $perda = Publication::where('category', 'PERDA')->get();
        $perbup = Publication::where('category', 'PERBUP')->get();
        $document = Publication::where('category', 'Document')->get();
        $address = address::where('id', 1)->first();
        $officehours = OfficeHour::all();

        return view('landingpage.download.index', compact('perda', 'perbup', 'document', 'address', 'officehours'));
    }
}
