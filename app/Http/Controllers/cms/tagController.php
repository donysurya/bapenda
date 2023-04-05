<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tags;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class tagController extends Controller
{
    public function create()
    {
        return view('cms.news.tags.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3'
        ]);
  
        try {
            DB::beginTransaction();
            $tags = Tags::create([
                'name' => $request->title,
                'slug' => Str::slug($request->title),
            ]);
            DB::commit();
            alert()->success('Success', 'Tag Berhasil Ditambahkan');
            return redirect()->route('cms.news.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function edit($id)
    {
        $tags = Tags::findorfail($id);
        return view('cms.news.tags.edit', compact('tags'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:3'
        ]);

        try {
            DB::beginTransaction();
            Tags::findOrFail($id)->update([
                'name' => $request->title,
                'slug' => Str::slug($request->title),
            ]);
            DB::commit();
            alert()->success('Success', 'Tag Berhasil Diubah');
            return redirect()->route('cms.news.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        $tags = Tags::findorfail($id);
        $tags->delete();
        alert()->success('Success', 'Tag Berhasil Dihapus!');
        return redirect()->route('cms.news.index');
    }
}
