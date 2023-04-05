<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Infografis;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class infografisController extends Controller
{
    public function create()
    {
        return view('cms.pages.infografis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp|max:2000',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/images',
                $request->file('file'),
            );
            $infografis = Infografis::create([
                'name' => $request->name,
                'image' => $path,
            ]);
            DB::commit();
            alert()->success('Success', 'Infografis Berhasil Ditambahkan');
            return redirect()->route('cms.other.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function show($id)
    {
        $infografis = Infografis::where('id', $id)->first();
        return view('cms.pages.infografis.show', compact('infografis'));
    }

    public function edit($id)
    {
        $infografis = Infografis::where('id', $id)->first();
        return view('cms.pages.infografis.edit', compact('infografis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $admin = auth()->guard('cms')->user()->id;
            Infografis::where('id', $id)->update([
                'name' => $request->name,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Infografis Berhasil Diubah');
            return redirect()->route('cms.other.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function image($id)
    {
        $infografis = Infografis::where('id', $id)->first();
        return view('cms.pages.infografis.image', compact('infografis'));
    }

    public function update_image(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp|max:2000',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/images',
                $request->file('file'),
            );
            $admin = auth()->guard('cms')->user()->id;
            Infografis::where('id', $id)->update([
                'image' => $path,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Gambar Infografis Berhasil Diubah');
            return redirect()->route('cms.other.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        Infografis::where('id', $id)->delete();
        alert()->success('Success', 'Infografis Berhasil Dihapus!');
        return redirect()->route('cms.other.index');
    }
}
