<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publication;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class publicationController extends Controller
{
    public function index() {
        $category = $_GET['category'] ?? 'All';
        if($category == 'All') {
            $name = $_GET['name'] ?? '';
            $publikasi = Publication::when($name != '', function ($query) use ($name) {
                            $query->where('name', 'LIKE', "%{$name}%");
                        })->paginate(10);
        } elseif($category == 'PERDA') {
            $name = $_GET['name'] ?? '';
            $publikasi = Publication::where('category', 'PERDA')->when($name != '', function ($query) use ($name) {
                            $query->where('name', 'LIKE', "%{$name}%");
                        })->paginate(10);
        } elseif($category == 'PERBUP') {
            $name = $_GET['name'] ?? '';
            $publikasi = Publication::where('category', 'PERBUP')->when($name != '', function ($query) use ($name) {
                            $query->where('name', 'LIKE', "%{$name}%");
                        })->paginate(10);
        } else {
            $name = $_GET['name'] ?? '';
            $publikasi = Publication::where('category', 'Document')->when($name != '', function ($query) use ($name) {
                            $query->where('name', 'LIKE', "%{$name}%");
                        })->paginate(10);
        }
        return view('cms.publikasi.index', compact('publikasi', 'category'));
    }

    public function create()
    {
        return view('cms.publikasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'file' => 'required|file|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp|max:2000',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/files',
                $request->file('file'),
            );
            $publikasi = Publication::create([
                'name' => $request->name,
                'category' => $request->category,
                'file' => $path,
            ]);
            DB::commit();
            alert()->success('Success', 'Data File Publikasi Berhasil Ditambahkan');
            return redirect()->route('cms.publikasi');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function show($id)
    {
        $publikasi = Publication::where('id', $id)->first();
        return view('cms.publikasi.show', compact('publikasi'));
    }

    public function edit($id)
    {
        $publikasi = Publication::where('id', $id)->first();
        return view('cms.publikasi.edit', compact('publikasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'file' => 'required|file|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp|max:2000',
        ]);

        try {
            DB::beginTransaction();
            $admin = auth()->guard('cms')->user()->id;
            $path = Storage::putFile(
                'public/files',
                $request->file('file'),
            );
            Publication::where('id', $id)->update([
                'name' => $request->name,
                'category' => $request->category,
                'file' => $path,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Data File Publikasi Berhasil Diubah');
            return redirect()->route('cms.publikasi');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        Publication::where('id', $id)->delete();
        alert()->success('Success', 'Data File Publikasi Berhasil Dihapus!');
        return redirect()->route('cms.publikasi');
    }
}
