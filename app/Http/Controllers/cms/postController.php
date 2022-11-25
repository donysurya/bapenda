<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tags;
use App\Models\Posts;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class postController extends Controller
{
    public function index()
    {
        $post = Posts::paginate(10);
        return view('cms.news.posts.index', compact('post'));
    }

    public function create()
    {
        $category = Category::all();
        $tag = Tags::all();
        return view('cms.news.posts.create', compact('category', 'tag'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'abstract' => 'required',
            'content' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:200',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/images',
                $request->file('picture'),
            );
            $post = Posts::create([
                'title' => $request->title,
                'category_id' => $request->category,
                'content' => $request->content,
                'abstract' => $request->abstract,
                'image' => $path,
                'slug' => Str::slug($request->title),
                'created_by' => auth()->guard('cms')->user()->id,
            ]);
            $post->tags()->attach($request->tags);
            DB::commit();
            alert()->success('Success', 'Bapenda News successfully Added');
            return redirect()->route('cms.news.post.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function edit($id)
    {
        $post = Posts::findorfail($id);
        $category = Category::all();
        $tag = Tags::all();
        return view('cms.news.posts.edit', compact('post', 'category', 'tag'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'abstract' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:200',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/images',
                $request->file('picture'),
            );
            $post = Posts::findOrFail($id);
            $post->update([
                'title' => $request->title,
                'category_id' => $request->category,
                'content' => $request->content,
                'abstract' => $request->abstract,
                'image' => $path,
                'slug' => Str::slug($request->title),
                'created_by' => auth()->guard('cms')->user()->id,
            ]);
            $post->tags()->sync($request->tags);
            DB::commit();
            alert()->success('Success', 'Bapenda News successfully Updated');
            return redirect()->route('cms.news.post.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        $post = Posts::findorfail($id);
        $post->delete();
        alert()->success('Success', 'Your Post Bapenda News has been Deleted!');
        return redirect()->route('cms.news.post.index');
    }
}
