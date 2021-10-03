<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Userloincontroller;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Customer;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::view('/','layouts.Login')->name('Login');
Route::post('/userlogin',[Userloincontroller::class,'logIn']);


Route::middleware(['userCheck'])->group(function () {
    Route::get('/home', function () {
        return view('layouts.app');
    });
    Route::post('/userReistration',[Userloincontroller::class,'userRegister']);
    Route::get('/registration', function () {
        return view('admin.user.loginform');
    });
   Route::get('/logout',[Userloincontroller::class,'userLogOut']);
   Route::get('/edit/{id}',[Userloincontroller::class,'editUser']);
   Route::post('/userUpdate',[Userloincontroller::class,'updateUser']);
   //creating category
   Route::view('/addCategory','admin.user.addCategory');
   Route::post('/insertcategory',[categoryController::class,"insertCategory"]);
   Route::get('/showCat',[categoryController::class,"showCategory"]);
   Route::get('/editcategory/{catId}',[categoryController::class,"editCategory"])->name('category');
   Route::post('/updateCategory',[categoryController::class,'updateCategory']);
   Route::get('/deleteCategory/{delCatId}',[categoryController::class,'deleteCategory']);
   //creating brnds
   Route::view('/addBrand',"admin.user.addBrand");
   Route::post('/createbrand',[BrandController::class,'saveBrand']);
   Route::get('/showBrand',[BrandController::class,'showBrandname']);
   Route::get('/brandedit/{brandId}',[BrandController::class,'updateBrand'])->name('brandeditroute');
   Route::post('/updatebrand',[BrandController::class,'updatenewbrand']);
   Route::get('/deletebrand/{id}',[BrandController::class,"deleteBrand"]);

   //product route 
   Route::get('/createprodouct',[ProductController::class,'create']);
   Route::post('/productCreate',[ProductController::class,'productInsert']);
   Route::get('/show-product',[ProductController::class,'ShowProduct']);
   Route::get('/editproduct/{id}',[ProductController::class,'editproduct']);
   Route::post('/update-product',[ProductController::class,'ProductUpdate']);
   Route::get('/deleteproduct/{id}',[ProductController::class,"deleteProduct"]);
   Route::get('/showSingleproduct/{id}',[ProductController::class,'SingleProduct']);
   Route::get('/session',[Customer::class,'sessionID']);
});

//for testing
Route::get("/test",[TestController::class,"test"]);