<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\HomeController;
Use App\Http\Controllers\AdminController;
Use App\Http\Controllers\SuperAdminController;
Use App\Http\Controllers\CategoryController;
Use App\Http\Controllers\SubCategoryController;

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

//frontend routes here
Route::get('/',[HomeController::class,'index']);

//backned routes here
Route::get('/admins',[AdminController::class,'index']);
Route::post('/admin-dashboard',[AdminController::class,'show_dashboard']);
Route::get('/dashboard',[SuperAdminController::class,'dashboard']);
Route::get('/logout',[SuperAdminController::class,'logout']);

//category routes here(optional)
//  Route::get('/edit{category}',[CategoryController::class,'edit']); 
//  Route::PUT('/update{category}',[CategoryController::class,'update']); 
//  Route:PUT('/delete{category}',[CategoryController::class,'destroy']); 

//Category routes here
Route::resource('/categories/',CategoryController::class);
Route::get('/cat-status{category}',[CategoryController::class,'change_status']);

//sub-category routes here
Route::resource('/sub-categories/',SubCategoryController::class);
Route::get('/subcat-status{subcategory}',[SubCategoryController::class,'change_status']);