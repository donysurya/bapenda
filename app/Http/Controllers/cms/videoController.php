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
    public function create()
    {
        return view('cms.pages.video.create');
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
            alert()->success('Success', 'Youtube Embed Video Berhasil Ditambahkan');
            return redirect()->route('cms.other.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function edit($id)
    {
        $video = Video::where('id', $id)->first();
        return view('cms.pages.video.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $admin = auth()->guard('cms')->user()->id;
            $embed = "https://www.youtube.com/embed/".$request->link."?autoplay=1";
            Video::where('id', $id)->update([
                'name' => $request->name,
                'link' => $embed,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Youtube Embed Video Berhasil Diubah');
            return redirect()->route('cms.other.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        Video::where('id', $id)->delete();
        alert()->success('Success', 'Youtube Embed Video Berhasil Dihapus!');
        return redirect()->route('cms.other.index');
    }
}
