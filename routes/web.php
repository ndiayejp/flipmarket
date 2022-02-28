<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;


  Route::group(['prefix'=>'admin', 'middleware'=>['admin:admin']],function(){
    Route::get('/login',[AdminController::class,'loginForm']);
    Route::post('/login',[AdminController::class,'store'])->name('admin.login');
  });

  Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () { return view('admin.index'); })->name('admin.dashboard')->middleware('auth:admin');


//admin route
  Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
  Route::get('/admin/profile',[AdminProfileController::class,'index'])->name('admin.profile');
  Route::get('/admin/profile/{id}',[AdminProfileController::class,'edit'])->name('admin.profile.edit');
  Route::post('/admin/profile/{id}',[AdminProfileController::class,'store'])->name('admin.profile.store');
  Route::get('/admin/update/password',[AdminProfileController::class,'updatePassword'])->name('admin.update.password');

  Route::post('/admin/updatePassword',[AdminProfileController::class, 'storePassword'])->name('admin.updatePassword');

Route::prefix('admin')->group(function(){
  // Brands Routes
  Route::get('/brands', [BrandController::class,'index'])->name('brands.index');
  Route::get('/brands/{brand}', [BrandController::class,'edit'])->name('brand.edit');
  Route::post('/brands/{brand}', [BrandController::class,'update'])->name('brand.update');
  Route::post('/brands',[BrandController::class,'store'])->name('brands.store');
  Route::get('/brand/{brand}',[BrandController::class,'destroy'])->name('brand.destroy');
    // Categories Routes
  Route::get('/categories', [CategoryController::class,'index'])->name('categories.index');
  Route::get('/category/create', [CategoryController::class,'create'])->name('category.create');
  Route::post('/category/create', [CategoryController::class,'store'])->name('category.store');
  Route::get('/categories/edit/{category}', [CategoryController::class,'edit'])->name('category.edit');
  Route::post('/categories/{category}', [CategoryController::class,'update'])->name('category.update');
  Route::get('/category/{category}',[CategoryController::class,'destroy'])->name('category.destroy');
  // SubCategory Routes
  Route::get('/subcategories', [SubCategoryController::class,'index'])->name('subcategories.index');
  Route::get('/subcategory/create', [SubCategoryController::class,'create'])->name('subcategory.create');
  Route::post('/subcategory/create', [SubCategoryController::class,'store'])->name('subcategory.store');
  Route::get('/subcategories/edit/{subcategory}', [SubCategoryController::class,'edit'])->name('subcategory.edit');
  Route::post('/subcategories/edit/{subcategory}', [SubCategoryController::class,'update'])->name('subcategory.update');
  Route::get('/subcategory/{subcategory}',[SubCategoryController::class,'destroy'])->name('subcategory.destroy');
  // subsubcategories
  Route::get('/subsubcategories', [SubSubCategoryController::class,'index'])->name('subsubcategories.index');
  Route::get('/subsubcategory/create', [SubSubCategoryController::class,'create'])->name('subsubcategory.create');
  Route::post('/subsubcategory/create', [SubSubCategoryController::class,'store'])->name('subsubcategory.store');
  Route::get('/subcategory/ajax/{category_id}', [SubSubCategoryController::class,'getsubcategory'])->name('subcategory.ajax');
  Route::get('/subsubcategories/edit/{subsubcategory}', [SubSubCategoryController::class,'edit'])->name('subsubcategory.edit');

  Route::post('/subsubcategories/edit/{subsubcategory}', [SubSubCategoryController::class,'update'])->name('subsubcategory.update');

  Route::get('/subsubcategory/{subsubcategory}',[SubSubCategoryController::class,'destroy'])->name('subsubcategory.destroy');
  //products CRUD
  Route::get('/products', [ProductController::class,'index'])->name('products.index');
  Route::get('/product/create', [ProductController::class,'create'])->name('product.create');
});

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
