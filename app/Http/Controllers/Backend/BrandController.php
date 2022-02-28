<?php

namespace App\Http\Controllers\backend;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brands.index',['brands'=>$brands]);
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
          'brand_name_fr'=>'required',
          'brand_name_en'=>'required',
          'brand_image'=>'required|image|mimes:jpg,png,jpeg,svg'
        ]);
        $filename = "";
        if($request->file('brand_image')){
          $file = $request->file('brand_image');
          $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
          Image::make($file)->resize(300,300)->save('uploads/brands_images/'.$filename);
        }
         Brand::create([
          'brand_name_fr'=>$request->input('brand_name_fr'),
          'brand_name_en'=>$request->input('brand_name_en'),
          'brand_slug_fr'=>Str::slug($request->input('brand_name_fr')),
          'brand_slug_en'=>Str::slug($request->input('brand_name_en')),
          'brand_image'=>$filename
        ]);

        $notification = [
          'message'=>'Band add successfully',
          'alert-type'=>'success'
        ];
        return redirect()->route('brands.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
      return view('admin.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
          'brand_name_fr'=>'required',
          'brand_name_en'=>'required',
          'brand_image'=>'sometimes|image|mimes:jpg,png,jpeg,svg'
        ]);
        $filename = $brand->brand_image;
        if($request->file('brand_image')){
          if(!empty($brand->brand_image)){
            unlink(public_path('uploads/brands_images/'.$brand->brand_image));
          }
          $file = $request->file('brand_image');
          $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
          Image::make($file)->resize(300,300)->save('uploads/brands_images/'.$filename);
        }
         $brand->update([
          'brand_name_fr'=>$request->input('brand_name_fr'),
          'brand_name_en'=>$request->input('brand_name_en'),
          'brand_slug_fr'=>Str::slug($request->input('brand_name_fr')),
          'brand_slug_en'=>Str::slug($request->input('brand_name_en')),
          'brand_image'=>$filename
        ]);

        $notification = [
          'message'=>'Band update successfully',
          'alert-type'=>'success'
        ];
        return redirect()->route('brands.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if(!empty($brand->brand_image)){
          unlink(public_path('uploads/brands_images/'.$brand->brand_image));
        }
        $brand->delete();
        $notification = [
          'message'=>'Band update successfully',
          'alert-type'=>'success'
        ];
        return redirect()->route('brands.index')->with($notification);
    }
}
