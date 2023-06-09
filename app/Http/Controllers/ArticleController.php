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
        $category = Category::all();
        $tag = Tags::all();
        $data2 = Posts::take(2)->get();
        $address = address::where('id', 1)->first();
        $officehours = OfficeHour::all();

        $search = $_GET['search'] ?? '';
        $category_name = $_GET['category'] ?? '';

        $a = Category::where('name', $category_name)->first();

        $data = Posts::when($category_name != '', function ($query) use ($a) {
                            $query->where('category_id', $a->id);
                        })->when($search != '', function ($query) use ($search) {
                            $query->where('title', 'LIKE', "%{$search}%");
                        })->paginate(5);

        return view('landingpage.article.index', compact('data', 'data2', 'category', 'tag', 'address', 'officehours'));
    }

    public function show($slug)
    {
        $category_widget = Category::all();
        $posts_widget = Posts::latest()->paginate(4);
        $tag = Tags::all();
        $data = Posts::where('slug', $slug)->first();
        $data2 = Posts::take(2)->get();
        $address = address::where('id', 1)->first();
        $officehours = OfficeHour::all();

        // $shareComponent = \Share::page(
        //     route('news.show', ['slug' => $slug]),
        //     $data->title,
        // )
        // ->facebook()
        // ->twitter()
        // ->telegram()
        // ->whatsapp();

        return view('landingpage.article.show', compact('data', 'data2', 'category_widget', 'posts_widget', 'tag', 'address', 'officehours'));
    }
}
