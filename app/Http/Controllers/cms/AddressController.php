<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\address;
use App\Models\OfficeHour;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AddressController extends Controller
{
    public function index()
    {
        $address = address::where('id', 1)->first();
        $hour1 = OfficeHour::where('id', 1)->first();
        $hour2 = OfficeHour::where('id', 2)->first();
        return view('cms.address.index', compact('address', 'hour1', 'hour2'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $admin = auth()->guard('cms')->user()->id;
            address::where('id', $id)->update([
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Informasi Bapenda Berhasil Diubah');
            return redirect()->route('cms.setting.address.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function updateHours(Request $request)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
            'start_time2' => 'required',
            'end_time2' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $admin = auth()->guard('cms')->user()->id;
            OfficeHour::where('id', 1)->update([
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'updated_by' => $admin,
            ]);
            OfficeHour::where('id', 2)->update([
                'start_time' => $request->start_time2,
                'end_time' => $request->end_time2,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Informasi Jam Layanan Bapenda Berhasil Diubah');
            return redirect()->route('cms.setting.address.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }
}
