<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class categoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate(10);
        return view('cms.news.category.index', compact('category'));
    }

    public function create()
    {
        return view('cms.news.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3'
        ]);
  
        try {
            DB::beginTransaction();
            $category = Category::create([
                'name' => $request->title,
                'slug' => Str::slug($request->title),
            ]);
            DB::commit();
            alert()->success('Success', 'Category for Bapenda News successfully Added');
            return redirect()->route('cms.news.category.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function edit($id)
    {
        $category = Category::findorfail($id);
        return view('cms.news.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:3'
        ]);

        try {
            DB::beginTransaction();
            Category::findOrFail($id)->update([
                'name' => $request->title,
                'slug' => Str::slug($request->title),
            ]);
            DB::commit();
            alert()->success('Success', 'Category for Bapenda News successfully Updated');
            return redirect()->route('cms.news.category.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        $category = Category::findorfail($id);
        $category->delete();
        alert()->success('Success', 'Your Category Bapenda News has been Deleted!');
        return redirect()->route('cms.news.category.index');
    }
}
