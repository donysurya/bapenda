<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class paymentController extends Controller
{
    public function create()
    {
        return view('cms.pages.payment.create');
    }

    public function detail_create($id)
    {
        return view('cms.pages.payment.detail.create', compact('id'));
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

    public function detail_store(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|file|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp|max:2000',
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/landingpage/payment',
                $request->file('file'),
            );
            $payment = PaymentDetail::create([
                'payment_id' => $id,
                'image' => $path,
                'description' => $request->description,
            ]);
            DB::commit();
            alert()->success('Success', 'Instruksi Pembayaran Berhasil Ditambahkan');
            return redirect()->route('cms.other.payment.show', ['id' => $id]);
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function show($id)
    {
        $payment = Payment::where('id', $id)->first();
        $payment_detail = PaymentDetail::where('payment_id', $id)->get();
        return view('cms.pages.payment.detail.index', compact('payment', 'payment_detail'));
    }

    public function edit($id)
    {
        $payment = Payment::where('id', $id)->first();
        return view('cms.pages.payment.edit', compact('payment'));
    }

    public function detail_edit($id, $detail)
    {
        $payment = PaymentDetail::where('id', $detail)->first();
        return view('cms.pages.payment.detail.edit', compact('payment', 'id'));
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

    public function detail_update(Request $request, $id, $detail)
    {
        $request->validate([
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $admin = auth()->guard('cms')->user()->id;
            PaymentDetail::where('id', $detail)->update([
                'description' => $request->description,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Instruksi Pembayaran Berhasil Diubah');
            return redirect()->route('cms.other.payment.show', ['id' => $id]);
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

    public function detail_image($id, $detail)
    {
        $payment = PaymentDetail::where('id', $detail)->first();
        return view('cms.pages.payment.detail.image', compact('payment', 'id'));
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

    public function detail_update_image(Request $request, $id, $detail)
    {
        $request->validate([
            'file' => 'required|file|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp|max:2000',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/landingpage/payment',
                $request->file('file'),
            );
            $admin = auth()->guard('cms')->user()->id;
            PaymentDetail::where('id', $detail)->update([
                'image' => $path,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Gambar Instruksi Pembayaran Berhasil Diubah');
            return redirect()->route('cms.other.payment.show', ['id' => $id]);
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

    public function detail_destroy($id)
    {
        PaymentDetail::where('id', $id)->delete();
        alert()->success('Success', 'Instruksi Pembayaran Berhasil Dihapus!');
        return redirect()->route('cms.other.payment.show', ['id' => $id]);
    }
}
