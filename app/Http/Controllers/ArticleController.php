<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tags;
use App\Models\Posts;
use App\Models\address;
use App\Models\OfficeHour;

class articleController extends Controller
{
    public function index()
    {
        $category_widget = Category::all();
        $posts_widget = Posts::latest()->paginate(4);
        $tag = Tags::all();
        $data = Posts::paginate(5);
        $address = address::where('id', 1)->first();
        $officehours = OfficeHour::all();

        return view('landingpage.article.index', compact('data', 'category_widget', 'posts_widget', 'tag', 'address', 'officehours'));
    }

    public function show($slug)
    {
        $category_widget = Category::all();
        $posts_widget = Posts::latest()->paginate(4);
        $tag = Tags::all();
        $data = Posts::where('slug', $slug)->first();
        $address = address::where('id', 1)->first();
        $officehours = OfficeHour::all();

        return view('landingpage.article.show', compact('data', 'category_widget', 'posts_widget', 'tag', 'address', 'officehours'));
    }
}
