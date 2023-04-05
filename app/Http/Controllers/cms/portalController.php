<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portal;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class portalController extends Controller
{
    public function create()
    {
        return view('cms.pages.portal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp|max:2000',
            'link' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/images',
                $request->file('file'),
            );
            $portal = Portal::create([
                'name' => $request->name,
                'image' => $path,
                'link' => $request->link,
            ]);
            DB::commit();
            alert()->success('Success', 'Link Portal Berhasil Ditambahkan');
            return redirect()->route('cms.other.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function edit($id)
    {
        $portal = Portal::where('id', $id)->first();
        return view('cms.pages.portal.edit', compact('portal'));
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
            Portal::where('id', $id)->update([
                'name' => $request->name,
                'link' => $request->link,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Link Portal Berhasil Diubah');
            return redirect()->route('cms.other.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function image($id)
    {
        $portal = Portal::where('id', $id)->first();
        return view('cms.pages.portal.image', compact('portal'));
    }

    public function update_image(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp|max:2000',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/images',
                $request->file('file'),
            );
            $admin = auth()->guard('cms')->user()->id;
            Portal::where('id', $id)->update([
                'image' => $path,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Logo Link Portal Berhasil Diubah');
            return redirect()->route('cms.other.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        Portal::where('id', $id)->delete();
        alert()->success('Success', 'Link Portal Berhasil Dihapus!');
        return redirect()->route('cms.other.index');
    }
}
