<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Infografis;
use App\Models\address;
use App\Models\OfficeHour;

class informationController extends Controller
{
    public function video()
    {
        $video = Video::all();
        $address = address::where('id', 1)->first();
        $officehours = OfficeHour::all();

        return view('landingpage.video.index', compact('video', 'address', 'officehours'));
    }

    public function infografis()
    {
        $infografis = Infografis::all();
        $address = address::where('id', 1)->first();
        $officehours = OfficeHour::all();

        return view('landingpage.infografis.index', compact('infografis', 'address', 'officehours'));
    }
}
