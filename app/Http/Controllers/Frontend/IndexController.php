<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.index');
    }

    public function logout(){
      Auth::logout();
      return redirect()->route('login');
    }

    public function profile(){
      if(!Auth::user()){
        return redirect()->route('login');
      }
      $id = Auth::user()->id;
      $user = User::find($id);
      return view('frontend.profile.user_profile',['user'=>$user]);
    }

    public function update(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->file('profile_photo_path')){
          $file  = $request->file('profile_photo_path');
          if(!empty($user->profile_photo_path)){
            @unlink(public_path('uploads/user_images/'.$user->profile_photo_path));
          }
          $filename = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path('uploads/user_images'),$filename);
          $user->profile_photo_path = $filename;
        }
        $user->save();
        $notification = [
          'message'=>'Profil mis à jour',
          'alert-type'=>'success'
        ];
        return redirect()->route('user.profile')->with($notification);
    }

    function updatePassword(){
       return view('frontend.profile.update_password');
    }
    function storePassword(Request $request){
      if(!Auth::user()){
          return redirect()->route('user.logout');
      }
      $validate = $request->validate([
        'oldpassword'=>'required',
        'password'=>'required|confirmed'
      ]);
      $hashPassword = User::find(Auth::user()->id)->password;
      if(Hash::check($request->oldpassword,$hashPassword)){
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::logout();
        return redirect()->route('user.logout');
      }else{
        return redirect()->back();
      }
    }
}
