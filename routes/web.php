<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\HomeController;
Use App\Http\Controllers\AdminController;
Use App\Http\Controllers\SuperAdminController;
Use App\Http\Controllers\CategoryController;
Use App\Http\Controllers\SubCategoryController;
Use App\Http\Controllers\BrandController;
Use App\Http\Controllers\UnitController;

//frontend routes here
Route::get('/',[HomeController::class,'index']);

//backned routes here
Route::get('/admins',[AdminController::class,'index']);
Route::post('/admin-dashboard',[AdminController::class,'show_dashboard']);
Route::get('/dashboard',[SuperAdminController::class,'dashboard']);
Route::get('/logout',[SuperAdminController::class,'logout']);

//Category routes here
// Route::get('/create',[CategoryController::class,'create']);
Route::resource('/categories/',CategoryController::class); //resource route
Route::get('/edit{category}',[CategoryController::class,'edit']); 
Route::put('/update{category}',[CategoryController::class,'update']); 
Route::put('/delete{category}',[CategoryController::class,'destroy']);
Route::get('/cat-status{category}',[CategoryController::class,'change_status']);

//sub-category routes here
Route::resource('/sub-categories/',SubCategoryController::class);
Route::get('/sub-categories/edit{subcategory}',[SubCategoryController::class,'edit']); 
Route::put('/sub-categories/update{subcategory}',[SubCategoryController::class,'update']); 
Route::put('/sub-categories/delete{subcategory}',[SubCategoryController::class,'destroy']);
Route::get('/subcat-status{subcategory}',[SubCategoryController::class,'change_status']);

//brand route here
Route::resource('/brand/',BrandController::class); //resource route
Route::get('/brand/edit{category}',[BrandController::class,'edit']); 
Route::put('/brand/update{category}',[BrandController::class,'update']); 
Route::put('/brand/delete{category}',[BrandController::class,'destroy']);
Route::get('/brand-status{category}',[BrandController::class,'change_status']);

//unit route here
Route::resource('/unit/',UnitController::class); //resource route
Route::get('/unit/edit{category}',[UnitController::class,'edit']); 
Route::put('/unit/update{category}',[UnitController::class,'update']); 
Route::put('/unit/delete{category}',[UnitController::class,'destroy']);
Route::get('/unit-status{category}',[UnitController::class,'change_status']);

//size route here
Route::resource('/unit/',UnitController::class); //resource route
Route::get('/unit/edit{category}',[UnitController::class,'edit']); 
Route::put('/unit/update{category}',[UnitController::class,'update']); 
Route::put('/unit/delete{category}',[UnitController::class,'destroy']);
Route::get('/unit-status{category}',[UnitController::class,'change_status']);

//color route here
Route::resource('/unit/',UnitController::class); //resource route
Route::get('/unit/edit{category}',[UnitController::class,'edit']); 
Route::put('/unit/update{category}',[UnitController::class,'update']); 
Route::put('/unit/delete{category}',[UnitController::class,'destroy']);
Route::get('/unit-status{category}',[UnitController::class,'change_status']);