<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $subcategories = SubCategory::all();
      return view('admin.subcategories.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories  = Category::all();
      return view('admin.subcategories.create', compact('categories'));
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
        'subcategory_name_fr'=>'required',
        'subcategory_name_en'=>'required',
        'category_id'=>'required'
      ]);
      SubCategory::insert([
        'subcategory_name_fr'=> $request->input('subcategory_name_fr'),
        'subcategory_name_en'=> $request->input('subcategory_name_en'),
        'subcategory_slug_fr'=> Str::slug($request->input('subcategory_name_fr')),
        'subcategory_slug_en'=> Str::slug($request->input('subcategory_name_en')),
        'category_id'        => $request->input('category_id')
      ]);
      $notification = [
        'message'=>'subCategory add successfully',
        'alert-type'=>'success'
      ];
      return redirect()->route('subcategories.index')->with($notification);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subcategory)
    {
      $categories = Category::all();
       return view('admin.subcategories.edit',compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subcategory)
    {
      $request->validate([
        'subcategory_name_fr'=>'required',
        'subcategory_name_en'=>'required',
        'category_id'=>'required'
      ]);
      $subcategory->update([
        'subcategory_name_fr'=>$request->input('subcategory_name_fr'),
        'subcategory_name_en'=>$request->input('subcategory_name_en'),
        'subcategory_slug_fr'=>Str::slug($request->input('subcategory_name_fr')),
        'subcategory_slug_en'=>Str::slug($request->input('subcategory_name_en')),
        'category_id'=>$request->input('category_id')
      ]);
      $notification = [
        'message'=>'SubCategory update successfully',
        'alert-type'=>'success'
      ];
      return redirect()->route('subcategories.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
      $subcategory->delete();
      return redirect()->route('subcategories.index');
    }
}
