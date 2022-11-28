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
        $video = Video::orderBy('created_at', 'desc')->first();
        $infografis = Infografis::take(4)->get();
        $flow = Flow::orderBy('created_at', 'desc')->first();
        $service = Service::all();
        $payment = Payment::all();
        $portal = Portal::take(5)->get();
        $publication = Publication::take(3)->get();
        $faq = faq::all();

        // Berita
        $post1 = Posts::orderBy('created_at', 'desc')->first();
        $post2 = Posts::orderBy('created_at', 'desc')->take(4)->get();

        return view ('landingpage.index', 
                        compact('video', 'post1', 'post2',
                                'infografis', 'flow',
                                'service', 'payment', 
                                'portal', 'publication', 
                                'faq')
                    );
    }
}
