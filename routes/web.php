<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;





Route::group(['prefix'=>'admin', 'middleware'=>['admin:admin']],function(){
  Route::get('/login',[AdminController::class,'loginForm']);
  Route::post('/login',[AdminController::class,'store'])->name('admin.login');
});


Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard')->middleware('auth:admin');


//admin route
Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('/admin/profile',[AdminProfileController::class,'index'])->name('admin.profile');
Route::get('/admin/profile/{id}',[AdminProfileController::class,'edit'])->name('admin.profile.edit');
Route::post('/admin/profile/{id}',[AdminProfileController::class,'store'])->name('admin.profile.store');
Route::get('/admin/update/password',[AdminProfileController::class,'updatePassword'])->name('admin.update.password');

Route::post('/admin/updatePassword',[AdminProfileController::class, 'storePassword'])->name('admin.updatePassword');

// User all routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [IndexController::class,'index'])->name('home');
Route::get('/user/logout',[IndexController::class,'logout'])->name('user.logout');
Route::get('/user/profile',[IndexController::class,'profile'])->name('user.profile');
Route::post('/user/profile',[IndexController::class,'update'])->name('profile.update');
Route::get('/user/update/password',[IndexController::class,'updatePassword'])->name('user.update.password');
Route::post('/user/update/password',[IndexController::class,'storePassword'])->name('user.store.password');
