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
        $nameCategory = $_GET['nameCategory'] ?? '';
        $nameTag = $_GET['nameTag'] ?? '';
        $namePost = $_GET['namePost'] ?? '';
        $category = Category::when($nameCategory != '', function ($query) use ($nameCategory) {
                            $query->where('name', 'LIKE', "%{$nameCategory}%");
                        })->paginate(5);
        $tag = Tags::when($nameTag != '', function ($query) use ($nameTag) {
                            $query->where('name', 'LIKE', "%{$nameTag}%");
                        })->paginate(5);
        $post = Posts::when($namePost != '', function ($query) use ($namePost) {
            $query->where('title', 'LIKE', "%{$namePost}%");
        })->paginate(10);
        return view('cms.news.index', compact('category', 'tag', 'post'));
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
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp|max:2000',
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
            alert()->success('Success', 'Berita Bapenda Berhasil Ditambahkan');
            return redirect()->route('cms.news.index');
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
        ]);

        try {
            DB::beginTransaction();
            $post = Posts::findOrFail($id);
            $post->update([
                'title' => $request->title,
                'category_id' => $request->category,
                'content' => $request->content,
                'abstract' => $request->abstract,
                'slug' => Str::slug($request->title),
                'created_by' => auth()->guard('cms')->user()->id,
            ]);
            $post->tags()->sync($request->tags);
            DB::commit();
            alert()->success('Success', 'Berita Bapenda Berhasil Diubah');
            return redirect()->route('cms.news.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function image($id)
    {
        $post = Posts::findorfail($id);
        return view('cms.news.posts.image', compact('post'));
    }

    public function update_image(Request $request, $id)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp|max:2000',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/images',
                $request->file('picture'),
            );
            $admin = auth()->guard('cms')->user()->id;
            Posts::where('id', $id)->update([
                'image' => $path,
                'created_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Gambar Berita Bapenda Berhasil Diubah');
            return redirect()->route('cms.news.index');
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
        alert()->success('Success', 'Berita Bapenda Berhasil Dihapus!');
        return redirect()->route('cms.news.index');
    }
}
