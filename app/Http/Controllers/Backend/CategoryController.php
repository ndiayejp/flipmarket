<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::all();
      return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'category_name_fr'=>'required',
        'category_name_en'=>'required',
        'category_icon'=>'required'
      ]);
      Category::insert([
        'category_name_fr'=>$request->input('category_name_fr'),
        'category_name_en'=>$request->input('category_name_en'),
        'category_slug_fr'=>Str::slug($request->input('category_name_fr')),
        'category_slug_en'=>Str::slug($request->input('category_name_en')),
        'category_icon'=>$request->input('category_icon')
      ]);

      $notification = [
        'message'=>'Category add successfully',
        'alert-type'=>'success'
      ];
      return redirect()->route('categories.index')->with($notification);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
      return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
      $request->validate([
        'category_name_fr'=>'required',
        'category_name_en'=>'required',
        'category_icon'=>'required'
      ]);
      $category->update([
        'category_name_fr'=>$request->input('category_name_fr'),
        'category_name_en'=>$request->input('category_name_en'),
        'category_slug_fr'=>Str::slug($request->input('category_name_fr')),
        'category_slug_en'=>Str::slug($request->input('category_name_en')),
        'category_icon'=>$request->input('category_icon')
    ]);

    $notification = [
      'message'=>'Category update successfully',
      'alert-type'=>'success'
    ];
    return redirect()->route('categories.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
      $category->delete();
      return redirect()->route('categories.index');
    }
}
