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
use App\Models\address;
use App\Models\OfficeHour;
use App\Models\faq;
use Carbon\Carbon;

class homeController extends Controller
{
    public function index() {
        $video = Video::orderBy('created_at', 'desc')->first();
        $infografis = Infografis::take(4)->get();
        $flow = Flow::all();
        $service = Service::all();
        $payment = Payment::all();
        $portal = Portal::take(5)->get();
        $publication = Publication::take(3)->get();
        $faq = faq::all();
        $bg = Background::where('active', '1')->first();
        $address = address::where('id', 1)->first();
        $officehours = OfficeHour::all();

        // Berita
        $post = Posts::orderBy('created_at', 'desc')->take(3)->get();

        return view ('landingpage.index', 
                        compact('video', 'post',
                                'infografis', 'flow',
                                'service', 'payment', 
                                'portal', 'publication', 
                                'faq', 'bg', 'address', 'officehours')
                    );
    }
}
