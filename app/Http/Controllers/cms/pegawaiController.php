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
        $name = $_GET['name'] ?? '';
        $nip = $_GET['nip'] ?? '';
        $pegawai = Pegawai::when($name != '', function ($query) use ($name) {
                            $query->where('nama', 'LIKE', "%{$name}%");
                        })->when($nip != '', function ($query) use ($nip) {
                            $query->where('nip', 'LIKE', "%{$nip}%");
                        })->paginate(10);
        return view('cms.data-pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        $golongan = array("I/A - Juru Muda", "I/B - Juru Muda Tingkat 1", "I/C - Juru", "I/D - Juru Tingkat 1", "II/A - Pengatur Muda", "II/B - Pengatur Muda Tingkat 1", "II/C - Pengatur", "II/D - Pengatur Tingkat 1", "III/A - Penata Muda", "III/B - Penata Muda Tingkat 1", "III/C - Penata", "III/D - Penata Tingkat 1", "IV/A - Pembina", "IV/B - Pembina Tingkat 1", "IV/C - Pembina Utama Muda", "IV/D - Pembina Utama Madya", "IV/E - Pembina Utama");
        return view('cms.data-pegawai.create', compact('golongan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'golongan' => 'required',
            'jabatan' => 'required',
            'keterangan' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp|max:2000',
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
            alert()->success('Success', 'Data Pegawai Berhasil Ditambahkan');
            return redirect()->route('cms.pegawai');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function show($id)
    {
        $golongan = array("I/A - Juru Muda", "I/B - Juru Muda Tingkat 1", "I/C - Juru", "I/D - Juru Tingkat 1", "II/A - Pengatur Muda", "II/B - Pengatur Muda Tingkat 1", "II/C - Pengatur", "II/D - Pengatur Tingkat 1", "III/A - Penata Muda", "III/B - Penata Muda Tingkat 1", "III/C - Penata", "III/D - Penata Tingkat 1", "IV/A - Pembina", "IV/B - Pembina Tingkat 1", "IV/C - Pembina Utama Muda", "IV/D - Pembina Utama Madya", "IV/E - Pembina Utama");
        $pegawai = Pegawai::where('id', $id)->first();
        return view('cms.data-pegawai.show', compact('pegawai', 'golongan'));
    }

    public function edit($id)
    {
        $golongan = array("I/A - Juru Muda", "I/B - Juru Muda Tingkat 1", "I/C - Juru", "I/D - Juru Tingkat 1", "II/A - Pengatur Muda", "II/B - Pengatur Muda Tingkat 1", "II/C - Pengatur", "II/D - Pengatur Tingkat 1", "III/A - Penata Muda", "III/B - Penata Muda Tingkat 1", "III/C - Penata", "III/D - Penata Tingkat 1", "IV/A - Pembina", "IV/B - Pembina Tingkat 1", "IV/C - Pembina Utama Muda", "IV/D - Pembina Utama Madya", "IV/E - Pembina Utama");
        $pegawai = Pegawai::where('id', $id)->first();
        return view('cms.data-pegawai.edit', compact('pegawai', 'golongan'));
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
            alert()->success('Success', 'Data Pegawai Berhasil Diubah');
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
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp|max:2000',
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
            alert()->success('Success', 'Foto Pegawai Berhasil Diubah');
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
        alert()->success('Success', 'Data Pegawai Berhasil Dihapus!');
        return redirect()->route('cms.pegawai');
    }
}
