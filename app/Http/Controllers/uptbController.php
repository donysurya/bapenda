<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uptb;
use App\Models\address;
use App\Models\OfficeHour;

class uptbController extends Controller
{
    public function index()
    {
        $uptb = Uptb::all();
        $address = address::where('id', 1)->first();
        $officehours = OfficeHour::all();

        return view('landingpage.uptb.index', compact('uptb', 'address', 'officehours'));
    }

    public function show($id)
    {
        $uptb = Uptb::where('id', $id)->first();
        $address = address::where('id', 1)->first();
        $officehours = OfficeHour::all();

        return view('landingpage.uptb.show', compact('uptb', 'address', 'officehours'));
    }
}
