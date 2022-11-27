<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Background;
use App\Models\Posts;
use App\Models\Video;
use App\Models\Infografis;
use App\Models\Flow;
use App\Models\Service;
use App\Models\Payment;
use App\Models\Portal;
use App\Models\Publication;
use App\Models\faq;
use Carbon\Carbon;

class homeController extends Controller
{
    public function index() {
        $background = Background::where('id', 1)->first();
        $video = Video::orderBy('created_at', 'desc')->first();
        $infografis = Infografis::take(4)->get();
        $flow = Flow::orderBy('created_at', 'desc')->first();
        $service = Service::all();
        $payment = Payment::all();
        $portal = Portal::take(5)->get();
        $publication = Publication::all();
        $faq = faq::all();
        return view ('landingpage.index', 
                        compact('background', 'video', 
                                'infografis', 'flow',
                                'service', 'payment', 
                                'portal', 'publication', 
                                'faq')
                    );
    }
}
