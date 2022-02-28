<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $subsubcategories = SubSubCategory::with('subcategory')->get();
      return view('admin.subsubcategories.index', compact('subsubcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();
      $subcategories = SubCategory::all();
      return view('admin.subsubcategories.create', compact('categories', 'subcategories'));
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
        'subsubcategory_name_fr'=>'required',
        'subsubcategory_name_en'=>'required',
        'category_id'           =>'required',
        'subcategory_id'        =>'required'
      ]);
      SubSubCategory::create([
        'subsubcategory_name_fr'=> $request->input('subsubcategory_name_fr'),
        'subsubcategory_name_en'=> $request->input('subsubcategory_name_en'),
        'subsubcategory_slug_fr'=> Str::slug($request->input('subsubcategory_name_fr')),
        'subsubcategory_slug_en'=> Str::slug($request->input('subsubcategory_name_en')),
        'category_id'           => $request->input('category_id'),
        'sub_category_id'      => $request->input('subcategory_id')
      ]);
      $notification = [
        'message'=>'Sub subCategory add successfully',
        'alert-type'=>'success'
      ];
      return redirect()->route('subsubcategories.index')->with($notification);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubSubCategory $subsubcategory)
    {
      $categories = Category::all();
      $subcategories = SubCategory::where('id',$subsubcategory->sub_category_id)->get();
      return view('admin.subsubcategories.edit', compact('categories','subcategories', 'subsubcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SubSubCategory $subsubcategory)
    {
      $request->validate([
        'subsubcategory_name_fr'=>'required',
        'subsubcategory_name_en'=>'required',
        'category_id'           =>'required',
        'subcategory_id'        =>'required'
      ]);
      $subsubcategory->update([
        'subsubcategory_name_fr'=> $request->input('subsubcategory_name_fr'),
        'subsubcategory_name_en'=> $request->input('subsubcategory_name_en'),
        'subsubcategory_slug_fr'=> Str::slug($request->input('subsubcategory_name_fr')),
        'subsubcategory_slug_en'=> Str::slug($request->input('subsubcategory_name_en')),
        'category_id'           => $request->input('category_id'),
        'sub_category_id'      => $request->input('subcategory_id')
      ]);
      $notification = [
        'message'=>'Sub subCategory updated successfully',
        'alert-type'=>'success'
      ];
      return redirect()->route('subsubcategories.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubSubCategory $subsubcategory)
    {
      $subsubcategory->delete();
      return redirect()->route('subsubcategories.index');
    }

    public function getsubcategory($cat_id){
      $subcat = SubCategory::where('category_id', $cat_id)
                            ->orderBy('subcategory_name_fr','ASC')
                            ->get();
      return json_encode($subcat);
    }
}
