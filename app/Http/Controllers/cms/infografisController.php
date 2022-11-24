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
    public function index() {
        $infografis = Infografis::all();
        return view('cms.infografis.index', compact('infografis'));
    }

    public function create()
    {
        return view('cms.infografis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|file|max:700',
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
            alert()->success('Success', 'Infografis successfully Created');
            return redirect()->route('cms.other.infografis');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function show($id)
    {
        $infografis = Infografis::where('id', $id)->first();
        return view('cms.infografis.show', compact('infografis'));
    }

    public function edit($id)
    {
        $infografis = Infografis::where('id', $id)->first();
        return view('cms.infografis.edit', compact('infografis'));
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
            alert()->success('Success', 'Your Infografis successfully updated');
            return redirect()->route('cms.other.infografis');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function image($id)
    {
        $infografis = Infografis::where('id', $id)->first();
        return view('cms.infografis.image', compact('infografis'));
    }

    public function update_image(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|file|max:700',
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
            alert()->success('Success', 'Your infografis successfully updated');
            return redirect()->route('cms.other.infografis');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        Infografis::where('id', $id)->delete();
        alert()->success('Success', 'Your Infografis has been deleted!');
        return redirect()->route('cms.other.infografis');
    }
}
