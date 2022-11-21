<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\faq;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class informationController extends Controller
{
    // FAQ 
    public function faq()
    {
        $faq = faq::all();
        return view('cms.faq.index', compact('faq'));
    }

    public function faq_create()
    {
        return view('cms.faq.create');
    }

    public function faq_store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $faq = faq::create([
                'title' => $request->title,
                'content' => $request->content,
            ]);
            DB::commit();
            alert()->success('Success', 'FAQ successfully Created');
            return redirect()->route('cms.other.faq');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function faq_show($id)
    {
        $faq = faq::where('id', $id)->first();
        return view('cms.faq.show', compact('faq'));
    }

    public function faq_edit($id)
    {
        $faq = faq::where('id', $id)->first();
        return view('cms.faq.edit', compact('faq'));
    }

    public function faq_update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        try {
            DB::beginTransaction();
            faq::where('id', $id)->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
            DB::commit();
            alert()->success('Success', 'Your FAQ successfully updated');
            return redirect()->route('cms.other.faq');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function faq_destroy($id)
    {
        faq::where('id', $id)->delete();
        alert()->success('Success', 'Your FAQ has been deleted!');
        return redirect()->route('cms.other.faq');
    }
}
