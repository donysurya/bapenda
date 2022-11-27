<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uptb;

class uptbController extends Controller
{
    public function index()
    {
        $uptb = Uptb::all();

        return view('landingpage.uptb.index', compact('uptb'));
    }

    public function show($id)
    {
        $uptb = Uptb::where('id', $id)->first();

        return view('landingpage.uptb.show', compact('uptb'));
    }
}
