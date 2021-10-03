<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Customer;

Route::get("/showProductForView",[ProductController::class,"show_view_product"]);
Route::get("/singleProduct/{id}",[ProductController::class,"viewSingleProduct"]);
Route::post("/customerRegistration",[ProductController::class,"customerRegister"]);
Route::post('/addToCart',[Customer::class,"AddCart"]);
Route::get("/cartResult/{id}",[Customer::class,"CartProduct"]);
Route::post("/updateCart",[Customer::class,"updateCartValue"]);
Route::get("/submitOrder/{id}",[Customer::class,"placeOrder"]);
Route::post("/deleteCartProduct",[Customer::class,"delteFromCart"]);
Route::post("/SingleOrder",[Customer::class,"Single_Order"]);
Route::get("/brandname",[Customer::class,"brand_name"]);
Route::get("/brand_product/{id}",[Customer::class,"BrandProduct"]);
Route::get("/search/{value}",[Customer::class,"Search_product"]);
Route::get("/confirmedOredeDetails/{id}",[Customer::class,"CustomerOrder"]);
Route::get("/customerAddress/{id}",[Customer::class,"customerAddress"]);
Route::post("/customer_eidit_data",[Customer::class,"submitUpdateData"]);
Route::post("/loginuser",[Customer::class,"userLogin"]);
Route::get("/cancelorder/{id}",[Customer::class,"cancelOrder"]);

Route::get("/pagination",[Customer::class,"productPaginate"]);
