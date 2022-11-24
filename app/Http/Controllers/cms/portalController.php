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
    public function index() {
        $portal = Portal::all();
        return view('cms.portal.index', compact('portal'));
    }

    public function create()
    {
        return view('cms.portal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|file|max:50',
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
            alert()->success('Success', 'Portal successfully Created');
            return redirect()->route('cms.other.portal');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function show($id)
    {
        $portal = Portal::where('id', $id)->first();
        return view('cms.portal.show', compact('portal'));
    }

    public function edit($id)
    {
        $portal = Portal::where('id', $id)->first();
        return view('cms.portal.edit', compact('portal'));
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
            alert()->success('Success', 'Your Portal successfully updated');
            return redirect()->route('cms.other.portal');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function image($id)
    {
        $portal = Portal::where('id', $id)->first();
        return view('cms.portal.image', compact('portal'));
    }

    public function update_image(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|file|max:50',
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
            alert()->success('Success', 'Your Portal Logo successfully updated');
            return redirect()->route('cms.other.portal');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        Portal::where('id', $id)->delete();
        alert()->success('Success', 'Your Portal has been deleted!');
        return redirect()->route('cms.other.portal');
    }
}
