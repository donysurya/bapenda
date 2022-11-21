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
            'file' => 'required',
            'link' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $portal = Portal::create([
                'name' => $request->name,
                'image' => $request->file,
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
            'file' => 'required',
            'link' => 'required',
        ]);

        try {
            DB::beginTransaction();
            Portal::where('id', $id)->update([
                'name' => $request->name,
                'image' => $request->file,
                'link' => $request->link,
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

    public function destroy($id)
    {
        Portal::where('id', $id)->delete();
        alert()->success('Success', 'Your Portal has been deleted!');
        return redirect()->route('cms.other.portal');
    }
}
