<?php

namespace App\Http\Controllers\Backend;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $adminData = Admin::find(1);
      return view('admin.admin_profile_view',compact('adminData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $user = Admin::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->file('profile_photo_path')){
          $file  = $request->file('profile_photo_path');
          if(!empty($user->profile_photo_path)){
            @unlink(public_path('uploads/admin_images/'.$user->profile_photo_path));
          }
          $filename = date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('uploads/admin_images'),$filename);
          $user->profile_photo_path = $filename;
        }
        $user->save();
        $notification = [
          'message'=>'Profil mis à jour',
          'alert-type'=>'success'
        ];
        return redirect()->route('admin.profile')->with($notification);
    }

    public function updatePassword(){
      return view('admin.admin_update_password');
    }
    public function storePassword(Request $request){
      $validate = $request->validate([
        'oldpassword'=>'required',
        'password'=>'required|confirmed'
      ]);
      $hashPassword = Admin::find(1)->password;
      if(Hash::check($request->oldpassword,$hashPassword)){
        $admin = Admin::find(1);
        $admin->password = Hash::make($request->password);
        $admin->save();
        Auth::logout();
        return redirect()->route('admin.logout');
      }else{
        return redirect()->back();
      }
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
    public function edit($id)
    {

        $data = Admin::find($id);
        return view('admin.admin_profile_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
