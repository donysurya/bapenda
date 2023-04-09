<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tags;
use App\Models\Posts;

class articleController extends Controller
{
    public function index()
    {
        $category_widget = Category::all();
        $posts_widget = Posts::latest()->paginate(4);
        $tag = Tags::all();
        $data = Posts::paginate(10);

        return view('landingpage.article.index', compact('data', 'category_widget', 'posts_widget', 'tag'));
    }

    public function show($slug)
    {
        $category_widget = Category::all();
        $posts_widget = Posts::latest()->paginate(4);
        $tag = Tags::all();
        $data = Posts::where('slug', $slug)->first();

        return view('landingpage.article.show', compact('data', 'category_widget', 'posts_widget', 'tag'));
    }
}
