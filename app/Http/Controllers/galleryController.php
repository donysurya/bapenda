<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class galleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::all();

        return view('landingpage.gallery.index', compact('gallery'));
    }
}
