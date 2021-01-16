<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('dashboard.category.index',compact('categories'));
    }
    public function create()
    {
        return view('dashboard.category.create');
    }

    public function store(Request $request)
    {
        $photo = $request->file('photo');
        $imageName = time() . '.' . $photo->getClientOriginalName();
        $photo->move(public_path('category'), $imageName);
        Category::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'photo' => $imageName
        ]);
        return redirect()->back();
    }
    public function edit($id){
        $category = Category::findOrFail($id);
        return view('dashboard.category.edit',compact('category'));
    }
    public function update(Request $request,$id){
        $category = Category::find($id);
        $category->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
        ]);
        return redirect() ->route('category.index');

    }
    public function getDelete($id){
        $category = Category::find($id);
        return view('dashboard.category.delete',compact('category'));
    }
    public function delete(Request $request,$id) {
        $category = Category::find($id)->delete();
        return redirect() ->route('category.index');
    }

}
