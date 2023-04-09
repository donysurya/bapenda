<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Background;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class backgroundController extends Controller
{
    public function create()
    {
        return view('cms.background.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp|max:2000',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/background',
                $request->file('file'),
            );
            $background = Background::create([
                'image' => $path,
                'active' => '0',
            ]);
            DB::commit();
            alert()->success('Success', 'Background Berhasil Ditambahkan');
            return redirect()->route('cms.home');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function edit($id)
    {
        $background = Background::where('id', $id)->first();
        return view('cms.background.edit', compact('background'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp|max:2000',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/background',
                $request->file('file'),
            );
            $admin = auth()->guard('cms')->user()->id;
            Background::where('id', $id)->update([
                'image' => $path,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Background Berhasil Diubah');
            return redirect()->route('cms.home');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        Background::where('id', $id)->delete();
        alert()->success('Success', 'Background Berhasil Dihapus!');
        return redirect()->route('cms.home');
    }

    public function setActive(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $admin = auth()->guard('cms')->user()->id;
            Background::where('id', '!=', $id)->update([
                'active' => '0',
            ]);
            Background::where('id', $id)->update([
                'active' => '1',
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Background Berhasil Diaktifkan');
            return redirect()->route('cms.home');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }
}
