<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vision;
use App\Models\Mission;
use App\Models\History;
use App\Models\Director;
use App\Models\Structure;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class profileController extends Controller
{
    public function index() {
        $vision = Vision::all();
        $mission = Mission::all();
        $sejarah = History::all();
        $kepala = Director::all();
        $struktur = Structure::all();
        return view('cms.bapenda.index', compact('vision', 'mission', 'sejarah', 'kepala', 'struktur'));
    }

    // Visi Bapenda
    public function vision_create()
    {
        return view('cms.bapenda.visi.create');
    }

    public function vision_store(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $vision = Vision::create([
                'description' => $request->description,
            ]);
            DB::commit();
            alert()->success('Success', 'Vision successfully Created');
            return redirect()->route('cms.profile.bapenda');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function vision_edit($id)
    {
        $vision = Vision::where('id', $id)->first();
        return view('cms.bapenda.visi.edit', compact('vision'));
    }

    public function vision_update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $admin = auth()->guard('cms')->user()->id;
            Vision::where('id', $id)->update([
                'description' => $request->description,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your Vision successfully updated');
            return redirect()->route('cms.profile.bapenda');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function vision_destroy($id)
    {
        Vision::where('id', $id)->delete();
        alert()->success('Success', 'Your Vision has been deleted!');
        return redirect()->route('cms.profile.bapenda');
    }

    // Misi Bapenda
    public function mission_create()
    {
        return view('cms.bapenda.misi.create');
    }

    public function mission_store(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $mission = Mission::create([
                'description' => $request->description,
            ]);
            DB::commit();
            alert()->success('Success', 'mission successfully Created');
            return redirect()->route('cms.profile.bapenda');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function mission_edit($id)
    {
        $mission = Mission::where('id', $id)->first();
        return view('cms.bapenda.misi.edit', compact('mission'));
    }

    public function mission_update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $admin = auth()->guard('cms')->user()->id;
            Mission::where('id', $id)->update([
                'description' => $request->description,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your mission successfully updated');
            return redirect()->route('cms.profile.bapenda');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function mission_destroy($id)
    {
        Mission::where('id', $id)->delete();
        alert()->success('Success', 'Your mission has been deleted!');
        return redirect()->route('cms.profile.bapenda');
    }

    // Sejarah Bapenda
    public function sejarah() {
        $sejarah = History::all();
        return view('cms.bapenda.sejarah.index', compact('sejarah'));
    }

    public function sejarah_create()
    {
        return view('cms.bapenda.sejarah.create');
    }

    public function sejarah_store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp|max:2000',
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/images',
                $request->file('file'),
            );
            $sejarah = History::create([
                'image' => $path,
                'description' => $request->description,
            ]);
            DB::commit();
            alert()->success('Success', 'History successfully Created');
            return redirect()->route('cms.profile.bapenda');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function sejarah_edit($id)
    {
        $sejarah = History::where('id', $id)->first();
        return view('cms.bapenda.sejarah.edit', compact('sejarah'));
    }

    public function sejarah_update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $admin = auth()->guard('cms')->user()->id;
            History::where('id', $id)->update([
                'description' => $request->description,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your History successfully updated');
            return redirect()->route('cms.profile.bapenda');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function sejarah_image($id)
    {
        $sejarah = History::where('id', $id)->first();
        return view('cms.bapenda.sejarah.image', compact('sejarah'));
    }

    public function sejarah_update_image(Request $request, $id)
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
            History::where('id', $id)->update([
                'image' => $path,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your Banner History successfully updated');
            return redirect()->route('cms.profile.bapenda');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function sejarah_destroy($id)
    {
        History::where('id', $id)->delete();
        alert()->success('Success', 'Your History has been deleted!');
        return redirect()->route('cms.profile.bapenda');
    }

    // Kepala Bapenda
    public function kepala() {
        $kepala = Director::all();
        return view('cms.bapenda.kepala.index', compact('kepala'));
    }

    public function kepala_create()
    {
        return view('cms.bapenda.kepala.create');
    }

    public function kepala_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp|max:2000',
            'description' => 'required',
            'jobdesk' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/images',
                $request->file('file'),
            );
            $kepala = Director::create([
                'name' => $request->name,
                'image' => $path,
                'description' => $request->description,
                'jobdesk' => $request->jobdesk,
            ]);
            DB::commit();
            alert()->success('Success', 'Director successfully Created');
            return redirect()->route('cms.profile.bapenda');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function kepala_edit($id)
    {
        $kepala = Director::where('id', $id)->first();
        return view('cms.bapenda.kepala.edit', compact('kepala'));
    }

    public function kepala_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'jobdesk' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $admin = auth()->guard('cms')->user()->id;
            Director::where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'jobdesk' => $request->jobdesk,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your Director successfully updated');
            return redirect()->route('cms.profile.bapenda');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function kepala_image($id)
    {
        $kepala = Director::where('id', $id)->first();
        return view('cms.bapenda.kepala.image', compact('kepala'));
    }

    public function kepala_update_image(Request $request, $id)
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
            Director::where('id', $id)->update([
                'image' => $path,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your Director Picture successfully updated');
            return redirect()->route('cms.profile.bapenda');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function kepala_destroy($id)
    {
        Director::where('id', $id)->delete();
        alert()->success('Success', 'Your Director has been deleted!');
        return redirect()->route('cms.profile.bapenda');
    }

    // Struktur Organisasi
    public function struktur_create()
    {
        return view('cms.bapenda.struktur.create');
    }

    public function struktur_store(Request $request)
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
            $struktur = Structure::create([
                'image' => $path,
            ]);
            DB::commit();
            alert()->success('Success', 'Organization Structure successfully Created');
            return redirect()->route('cms.profile.bapenda');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function struktur_edit($id)
    {
        $struktur = Structure::where('id', $id)->first();
        return view('cms.bapenda.struktur.edit', compact('struktur'));
    }

    public function struktur_update(Request $request, $id)
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
            Structure::where('id', $id)->update([
                'image' => $path,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Your Organization Structure Picture successfully updated');
            return redirect()->route('cms.profile.bapenda');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function struktur_destroy($id)
    {
        Structure::where('id', $id)->delete();
        alert()->success('Success', 'Your Organization Structure has been deleted!');
        return redirect()->route('cms.profile.bapenda');
    }
}
