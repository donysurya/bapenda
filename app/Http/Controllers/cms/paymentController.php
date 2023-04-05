<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class paymentController extends Controller
{
    public function create()
    {
        return view('cms.pages.payment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|file|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp|max:2000',
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/images',
                $request->file('file'),
            );
            $payment = Payment::create([
                'name' => $request->name,
                'image' => $path,
                'description' => $request->description,
            ]);
            DB::commit();
            alert()->success('Success', 'Jenis Pembayaran Berhasil Ditambahkan');
            return redirect()->route('cms.other.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function show($id)
    {
        $payment = Payment::where('id', $id)->first();
        return view('cms.pages.payment.show', compact('payment'));
    }

    public function edit($id)
    {
        $payment = Payment::where('id', $id)->first();
        return view('cms.pages.payment.edit', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $admin = auth()->guard('cms')->user()->id;
            Payment::where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Jenis Pembayaran Berhasil Diubah');
            return redirect()->route('cms.other.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function image($id)
    {
        $payment = Payment::where('id', $id)->first();
        return view('cms.pages.payment.image', compact('payment'));
    }

    public function update_image(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|file|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp|max:2000',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/images',
                $request->file('file'),
            );
            $admin = auth()->guard('cms')->user()->id;
            Payment::where('id', $id)->update([
                'image' => $path,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Logo Jenis Pembayaran Berhasil Diubah');
            return redirect()->route('cms.other.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        Payment::where('id', $id)->delete();
        alert()->success('Success', 'Jenis Pembayaran Berhasil Dihapus!');
        return redirect()->route('cms.other.index');
    }
}
