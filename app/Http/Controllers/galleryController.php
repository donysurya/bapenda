<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\address;
use App\Models\OfficeHour;

class galleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::all();
        $address = address::where('id', 1)->first();
        $officehours = OfficeHour::all();

        return view('landingpage.gallery.index', compact('gallery', 'address', 'officehours'));
    }
}
