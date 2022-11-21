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
    public function index() {
        $payment = Payment::all();
        return view('cms.payment.index', compact('payment'));
    }

    public function create()
    {
        return view('cms.payment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required',
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $portal = Portal::create([
                'name' => $request->name,
                'image' => $request->file,
                'description' => $request->description,
            ]);
            DB::commit();
            alert()->success('Success', 'Payment successfully Created');
            return redirect()->route('cms.other.payment');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function show($id)
    {
        $payment = Payment::where('id', $id)->first();
        return view('cms.payment.show', compact('payment'));
    }

    public function edit($id)
    {
        $payment = Payment::where('id', $id)->first();
        return view('cms.payment.edit', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required',
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();
            Payment::where('id', $id)->update([
                'name' => $request->name,
                'image' => $request->file,
                'description' => $request->description,
            ]);
            DB::commit();
            alert()->success('Success', 'Your Payment successfully updated');
            return redirect()->route('cms.other.payment');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        Payment::where('id', $id)->delete();
        alert()->success('Success', 'Your Payment Method has been deleted!');
        return redirect()->route('cms.other.payment');
    }
}
