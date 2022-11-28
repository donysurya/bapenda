<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Infografis;

class informationController extends Controller
{
    public function video()
    {
        $video = Video::all();

        return view('landingpage.video.index', compact('video'));
    }

    public function infografis()
    {
        $infografis = Infografis::all();

        return view('landingpage.infografis.index', compact('infografis'));
    }
}
