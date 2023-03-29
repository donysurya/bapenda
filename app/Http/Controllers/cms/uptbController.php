<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Uptb;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class uptbController extends Controller
{
    public function index() {
        $name = $_GET['name'] ?? '';
        $uptb = Uptb::when($name != '', function ($query) use ($name) {
                            $query->where('name', 'LIKE', "%{$name}%");
                        })->paginate(10);
        return view('cms.profil-uptb.index', compact('uptb'));
    }

    public function create()
    {
        return view('cms.profil-uptb.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'peran' => 'required',
            'fungsi' => 'required',
            'layanan_pajak' => 'required',
            'wilayah_uptb' => 'required',
            'jam_layanan' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp|max:2000',
            'maps_uptb' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp|max:2000',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/images',
                $request->file('file'),
            );
            $path2 = Storage::putFile(
                'public/images',
                $request->file('maps_uptb'),
            );
            $uptb = Uptb::create([
                'name' => $request->name,
                'peran' => $request->peran,
                'fungsi' => $request->fungsi,
                'layanan_pajak' => $request->layanan_pajak,
                'wilayah_uptb' => $request->wilayah_uptb,
                'jam_layanan' => $request->jam_layanan,
                'image' => $path,
                'maps_uptb' => $path2,
            ]);
            DB::commit();
            alert()->success('Success', 'Profile UPTB successfully Created');
            return redirect()->route('cms.uptb');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function show($id)
    {
        $uptb = Uptb::where('id', $id)->first();
        return view('cms.profil-uptb.show', compact('uptb'));
    }

    public function edit($id)
    {
        $uptb = Uptb::where('id', $id)->first();
        return view('cms.profil-uptb.edit', compact('uptb'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'peran' => 'required',
            'fungsi' => 'required',
            'layanan_pajak' => 'required',
            'wilayah_uptb' => 'required',
            'jam_layanan' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $admin = auth()->guard('cms')->user()->id;
            Uptb::where('id', $id)->update([
                'name' => $request->name,
                'peran' => $request->peran,
                'fungsi' => $request->fungsi,
                'layanan_pajak' => $request->layanan_pajak,
                'wilayah_uptb' => $request->wilayah_uptb,
                'jam_layanan' => $request->jam_layanan,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your Profile UPTB successfully updated');
            return redirect()->route('cms.uptb');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function image($id)
    {
        $uptb = Uptb::where('id', $id)->first();
        return view('cms.profil-uptb.image', compact('uptb'));
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
            Uptb::where('id', $id)->update([
                'image' => $path,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your UPTB Image successfully updated');
            return redirect()->route('cms.uptb');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function maps_image($id)
    {
        $uptb = Uptb::where('id', $id)->first();
        return view('cms.profil-uptb.maps', compact('uptb'));
    }

    public function maps_update_image(Request $request, $id)
    {
        $request->validate([
            'maps_uptb' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp|max:2000',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/images',
                $request->file('maps_uptb'),
            );
            $admin = auth()->guard('cms')->user()->id;
            Uptb::where('id', $id)->update([
                'maps_uptb' => $path,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your UPTB Maps successfully updated');
            return redirect()->route('cms.uptb');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        Uptb::where('id', $id)->delete();
        alert()->success('Success', 'Your Profile UPTB has been deleted!');
        return redirect()->route('cms.uptb');
    }
}
