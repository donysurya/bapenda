<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Realization;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class realizationController extends Controller
{
    public function index() {
        $name = $_GET['name'] ?? '';
        $realisasi = Realization::when($name != '', function ($query) use ($name) {
                            $query->where('name', 'LIKE', "%{$name}%");
                        })->get();
        return view('cms.realisasi.index', compact('realisasi'));
    }

    public function create()
    {
        return view('cms.realisasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|file|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp|max:2000',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/files',
                $request->file('file'),
            );
            $realisasi = Realization::create([
                'name' => $request->name,
                'file' => $path,
            ]);
            DB::commit();
            alert()->success('Success', 'Realization File successfully Created');
            return redirect()->route('cms.realisasi');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function show($id)
    {
        $realisasi = Realization::where('id', $id)->first();
        return view('cms.realisasi.show', compact('realisasi'));
    }

    public function edit($id)
    {
        $realisasi = Realization::where('id', $id)->first();
        return view('cms.realisasi.edit', compact('realisasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|file|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp|max:2000',
        ]);

        try {
            DB::beginTransaction();
            $admin = auth()->guard('cms')->user()->id;
            $path = Storage::putFile(
                'public/files',
                $request->file('file'),
            );
            Realization::where('id', $id)->update([
                'name' => $request->name,
                'file' => $path,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your Realization File successfully updated');
            return redirect()->route('cms.realisasi');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        Realization::where('id', $id)->delete();
        alert()->success('Success', 'Your Realization File has been deleted!');
        return redirect()->route('cms.realisasi');
    }
}
