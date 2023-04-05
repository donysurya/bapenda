<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\faq;
use App\Models\Service;
use App\Models\Flow;
use App\Models\Payment;
use App\Models\Infografis;
use App\Models\Portal;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class informationController extends Controller
{
    // Landing Pages
    public function index()
    {
        $payment = Payment::paginate(5);
        $flow = Flow::paginate(5);
        $service = Service::paginate(5);
        $infografis = Infografis::paginate(5);
        $faq = faq::paginate(5);
        $portal = Portal::paginate(5);
        $video = Video::paginate(5);

        return view('cms.pages.index', compact('payment', 'flow', 'service', 'infografis', 'faq', 'portal', 'video'));
    }

    // FAQ 
    public function faq_create()
    {
        return view('cms.pages.faq.create');
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
            alert()->success('Success', 'FAQ Berhasil Ditambahkan');
            return redirect()->route('cms.other.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function faq_edit($id)
    {
        $faq = faq::where('id', $id)->first();
        return view('cms.pages.faq.edit', compact('faq'));
    }

    public function faq_update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $admin = auth()->guard('cms')->user()->id;
            faq::where('id', $id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'FAQ Berhasil Diubah');
            return redirect()->route('cms.other.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function faq_destroy($id)
    {
        faq::where('id', $id)->delete();
        alert()->success('Success', 'FAQ Berhasil Dihapus!');
        return redirect()->route('cms.other.index');
    }

    // Jenis Pelayanan
    public function service_create()
    {
        return view('cms.pages.service.create');
    }

    public function service_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp|max:2000',
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
            alert()->success('Success', 'Jenis Pelayanan Berhasil Ditambahkan');
            return redirect()->route('cms.other.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function service_edit($id)
    {
        $service = Service::where('id', $id)->first();
        return view('cms.pages.service.edit', compact('service'));
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
            alert()->success('Success', 'Jenis Layanan Berhasil Diubah');
            return redirect()->route('cms.other.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function service_image($id)
    {
        $service = Service::where('id', $id)->first();
        return view('cms.pages.service.image', compact('service'));
    }

    public function service_update_image(Request $request, $id)
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
            Service::where('id', $id)->update([
                'image' => $path,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Logo Jenis Layanan Berhasil Diubah');
            return redirect()->route('cms.other.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function service_destroy($id)
    {
        Service::where('id', $id)->delete();
        alert()->success('Success', 'Jenis Layanan Berhasil Dihapus!');
        return redirect()->route('cms.other.index');
    }

    // Alur Proses
    public function flow_create()
    {
        return view('cms.pages.flow.create');
    }

    public function flow_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp|max:2000',
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
            alert()->success('Success', 'Alur Proses Berhasil Ditambahkan');
            return redirect()->route('cms.other.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function flow_edit($id)
    {
        $flow = Flow::where('id', $id)->first();
        return view('cms.pages.flow.edit', compact('flow'));
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
            alert()->success('Success', 'Alur Proses Berhasil Diubah');
            return redirect()->route('cms.other.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function flow_image($id)
    {
        $flow = Flow::where('id', $id)->first();
        return view('cms.pages.flow.image', compact('flow'));
    }

    public function flow_update_image(Request $request, $id)
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
            Flow::where('id', $id)->update([
                'image' => $path,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Logo Alur Proses Berhasil Diubah');
            return redirect()->route('cms.other.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function flow_destroy($id)
    {
        Flow::where('id', $id)->delete();
        alert()->success('Success', 'Alur Proses Berhasil Dihapus!');
        return redirect()->route('cms.other.index');
    }
}
