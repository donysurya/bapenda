<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class settingController extends Controller
{
    public function index()
    {
        return view('cms.setting.index');
    }

    public function updateInformation(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        try {
            DB::beginTransaction();
            Cms::where('id', $id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
            DB::commit();
            alert()->success('Success', 'Informasi Administrator Berhasil Diubah');
            return redirect()->route('cms.setting.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|same:password',
        ]); 

        $user = Cms::find(auth()->guard('cms')->user()->id);

        if (!Hash::check($request->current_password, $user->password)) {
            alert()->error('Error','Current password does not match!');
            return back();
        }

        $user->password = Hash::make($request->password);
        $user->save();

        alert()->success('Success','Password successfully changed!');
        return back();
    }
}
