<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        $category = Category::all();
        return view('dashboard.product.index',compact('products','category'));
    }
    public function create () {
        $categories = Category::all();
        return view('dashboard.product.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $photo = $request->file('photo');
        $imageName = time() . '.' . $photo->getClientOriginalName();
        $photo->move(public_path('products'), $imageName);
        Product::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'photo' => $imageName,
            'category_id' => $request->category_id
        ]);
        return redirect()->back();
    }
    public function edit($id){
        $product = Product::find($id);
        return view('dashboard.product.edit',compact('product'));
    }
    public function getDelete($id){
        $product = Product::find($id);
        return view('dashboard.product.delete',compact('product'));
    }
    public function delete(Request $request,$id){
        $product = Product::find($id)->delete();
        return redirect() ->route('product.index');
    }
}
