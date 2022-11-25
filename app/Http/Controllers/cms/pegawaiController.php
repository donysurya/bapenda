<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class pegawaiController extends Controller
{
    public function index() {
        $pegawai = Pegawai::all();
        return view('cms.data-pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        return view('cms.data-pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'golongan' => 'required',
            'jabatan' => 'required',
            'keterangan' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:300',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/pegawai',
                $request->file('file'),
            );
            $pegawai = Pegawai::create([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'golongan' => $request->golongan,
                'jabatan' => $request->jabatan,
                'keterangan' => $request->keterangan,
                'image' => $path,
            ]);
            DB::commit();
            alert()->success('Success', 'Data successfully Created');
            return redirect()->route('cms.pegawai');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function show($id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        return view('cms.data-pegawai.show', compact('pegawai'));
    }

    public function edit($id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        return view('cms.data-pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'golongan' => 'required',
            'jabatan' => 'required',
            'keterangan' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $admin = auth()->guard('cms')->user()->id;
            Pegawai::where('id', $id)->update([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'golongan' => $request->golongan,
                'jabatan' => $request->jabatan,
                'keterangan' => $request->keterangan,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your Data successfully updated');
            return redirect()->route('cms.pegawai');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function image($id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        return view('cms.data-pegawai.image', compact('pegawai'));
    }

    public function update_image(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:300',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/pegawai',
                $request->file('file'),
            );
            $admin = auth()->guard('cms')->user()->id;
            Pegawai::where('id', $id)->update([
                'image' => $path,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your Data successfully updated');
            return redirect()->route('cms.pegawai');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        Pegawai::where('id', $id)->delete();
        alert()->success('Success', 'Your Data has been deleted!');
        return redirect()->route('cms.pegawai');
    }
}
