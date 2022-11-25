<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class galleryController extends Controller
{
    public function index() {
        $gallery = Gallery::all();
        return view('cms.gallery.index', compact('gallery'));
    }

    public function create()
    {
        return view('cms.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:100',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:700',
        ]);

        try {
            DB::beginTransaction();
            $thumb = Storage::putFile(
                'public/gallery',
                $request->file('thumbnail'),
            );
            $path = Storage::putFile(
                'public/gallery',
                $request->file('file'),
            );
            $gallery = Gallery::create([
                'name' => $request->name,
                'thumbnail' => $thumb,
                'image' => $path,
            ]);
            DB::commit();
            alert()->success('Success', 'Gallery successfully Created');
            return redirect()->route('cms.gallery');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function show($id)
    {
        $gallery = Gallery::where('id', $id)->first();
        return view('cms.gallery.show', compact('gallery'));
    }

    public function edit($id)
    {
        $gallery = Gallery::where('id', $id)->first();
        return view('cms.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $admin = auth()->guard('cms')->user()->id;
            Gallery::where('id', $id)->update([
                'name' => $request->name,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your Gallery successfully updated');
            return redirect()->route('cms.gallery');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function image($id)
    {
        $gallery = Gallery::where('id', $id)->first();
        return view('cms.gallery.image', compact('gallery'));
    }

    public function update_image(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:700',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/gallery',
                $request->file('file'),
            );
            $admin = auth()->guard('cms')->user()->id;
            Gallery::where('id', $id)->update([
                'image' => $path,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your gallery successfully updated');
            return redirect()->route('cms.gallery');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }
    
    public function thumbnail($id)
    {
        $gallery = Gallery::where('id', $id)->first();
        return view('cms.gallery.thumbnail', compact('gallery'));
    }

    public function update_thumbnail(Request $request, $id)
    {
        $request->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:100',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/gallery',
                $request->file('thumbnail'),
            );
            $admin = auth()->guard('cms')->user()->id;
            Gallery::where('id', $id)->update([
                'thumbnail' => $path,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your gallery successfully updated');
            return redirect()->route('cms.gallery');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        Gallery::where('id', $id)->delete();
        alert()->success('Success', 'Your gallery has been deleted!');
        return redirect()->route('cms.gallery');
    }
}
