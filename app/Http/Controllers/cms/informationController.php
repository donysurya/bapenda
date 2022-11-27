<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\faq;
use App\Models\Service;
use App\Models\Flow;
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

    // Jenis Pelayanan
    public function service() {
        $service = Service::all();
        return view('cms.service.index', compact('service'));
    }

    public function service_create()
    {
        return view('cms.service.create');
    }

    public function service_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:50',
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/images',
                $request->file('file'),
            );
            $service = Service::create([
                'name' => $request->name,
                'image' => $path,
                'description' => $request->description,
            ]);
            DB::commit();
            alert()->success('Success', 'Service successfully Created');
            return redirect()->route('cms.other.service');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function service_show($id)
    {
        $service = Service::where('id', $id)->first();
        return view('cms.service.show', compact('service'));
    }

    public function service_edit($id)
    {
        $service = Service::where('id', $id)->first();
        return view('cms.service.edit', compact('service'));
    }

    public function service_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $admin = auth()->guard('cms')->user()->id;
            Service::where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your service successfully updated');
            return redirect()->route('cms.other.service');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function service_image($id)
    {
        $service = Service::where('id', $id)->first();
        return view('cms.service.image', compact('service'));
    }

    public function service_update_image(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:50',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/images',
                $request->file('file'),
            );
            $admin = auth()->guard('cms')->user()->id;
            Service::where('id', $id)->update([
                'image' => $path,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your Service Logo successfully updated');
            return redirect()->route('cms.other.service');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function service_destroy($id)
    {
        Service::where('id', $id)->delete();
        alert()->success('Success', 'Your Service has been deleted!');
        return redirect()->route('cms.other.service');
    }

    // Alur Proses
    public function flow() {
        $flow = Flow::all();
        return view('cms.flow.index', compact('flow'));
    }

    public function flow_create()
    {
        return view('cms.flow.create');
    }

    public function flow_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:500',
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/images',
                $request->file('file'),
            );
            $flow = Flow::create([
                'name' => $request->name,
                'image' => $path,
                'description' => $request->description,
            ]);
            DB::commit();
            alert()->success('Success', 'flow successfully Created');
            return redirect()->route('cms.other.flow');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function flow_show($id)
    {
        $flow = Flow::where('id', $id)->first();
        return view('cms.flow.show', compact('flow'));
    }

    public function flow_edit($id)
    {
        $flow = Flow::where('id', $id)->first();
        return view('cms.flow.edit', compact('flow'));
    }

    public function flow_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $admin = auth()->guard('cms')->user()->id;
            Flow::where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your process flow successfully updated');
            return redirect()->route('cms.other.flow');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function flow_image($id)
    {
        $flow = Flow::where('id', $id)->first();
        return view('cms.flow.image', compact('flow'));
    }

    public function flow_update_image(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:500',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/images',
                $request->file('file'),
            );
            $admin = auth()->guard('cms')->user()->id;
            Flow::where('id', $id)->update([
                'image' => $path,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your Process Flow Logo successfully updated');
            return redirect()->route('cms.other.flow');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function flow_destroy($id)
    {
        Flow::where('id', $id)->delete();
        alert()->success('Success', 'Your process flow has been deleted!');
        return redirect()->route('cms.other.flow');
    }
}
