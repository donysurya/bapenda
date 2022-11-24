<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class videoController extends Controller
{
    public function index() {
        $video = Video::all();
        return view('cms.video.index', compact('video'));
    }

    public function create()
    {
        return view('cms.video.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $embed = "https://www.youtube.com/embed/".$request->link."?autoplay=1";
            $video = Video::create([
                'name' => $request->name,
                'link' => $embed,
            ]);
            DB::commit();
            alert()->success('Success', 'Video successfully Created');
            return redirect()->route('cms.other.video');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function show($id)
    {
        $video = Video::where('id', $id)->first();
        return view('cms.video.show', compact('video'));
    }

    public function edit($id)
    {
        $video = Video::where('id', $id)->first();
        return view('cms.video.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $embed = "https://www.youtube.com/embed/".$request->link."?autoplay=1";
            Video::where('id', $id)->update([
                'name' => $request->name,
                'link' => $embed,
            ]);
            DB::commit();
            alert()->success('Success', 'Your Video successfully updated');
            return redirect()->route('cms.other.video');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        Video::where('id', $id)->delete();
        alert()->success('Success', 'Your Video has been deleted!');
        return redirect()->route('cms.other.video');
    }
}
