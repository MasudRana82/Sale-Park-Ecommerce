<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\HomeController;
Use App\Http\Controllers\AdminController;
Use App\Http\Controllers\SuperAdminController;
Use App\Http\Controllers\CategoryController;
Use App\Http\Controllers\SubCategoryController;
Use App\Http\Controllers\BrandController;
Use App\Http\Controllers\UnitController;
Use App\Http\Controllers\SizeController;
Use App\Http\Controllers\ColorController;
Use App\Http\Controllers\ProductController;
Use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\WishlistController;


//frontend routes here
Route::get('/', [HomeController::class, 'index']);
Route::get('/view-product{id}', [HomeController::class, 'view_details']);
Route::get('/product_by_cat{id}', [HomeController::class, 'product_by_cat']);
Route::get('/product_by_subcat{id}', [HomeController::class, 'product_by_subcat']);
Route::get('/product_by_brand{id}', [HomeController::class, 'product_by_brand']);
Route::get('/search', [HomeController::class, 'search']);

//add to cart Route
Route::post('/add-to-cart', [CartController::class, 'add_to_cart']);
Route::get('/delete{id}', [CartController::class, 'delete']);

//wishlist routes
Route::post('/add-wishlist', [WishlistController::class, 'add_wishlist']);
Route::post('/wishlist-delete/{id}', [WishlistController::class, 'delete']);
Route::get('/wishlist', [WishlistController::class, 'wishlist']);

//comments routes
Route::post('/commnent-add',[CommentController::class, 'add_commnent']);

//order_related routes..
Route::get('/manage-orders', [OrderController::class, 'manage_orders']);
Route::get('/order-view/{id}', [OrderController::class, 'order_view']);
Route::get('/invoice/{id}', [OrderController::class, 'invoice']);

// SSLCOMMERZ Start
// Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
// Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


//checkout routes
Route::get('/checkout', [CheckoutController::class, 'checkout']);




// customers Login routes
Route::get('/login', [CustomerController::class, 'login']);
Route::post('/signup', [CustomerController::class, 'signup']);
Route::get('/login-check', [CustomerController::class, 'login_check']);
Route::get('/customer-logout', [CustomerController::class, 'customer_logout']);



//backned routes here
Route::get('/admins',[AdminController::class,'index']);
Route::post('/admin-dashboard',[AdminController::class,'show_dashboard']);
Route::get('/dashboard',[SuperAdminController::class,'dashboard']);
Route::get('/logout',[SuperAdminController::class,'logout']);




//Product route here
Route::resource('/product/',ProductController::class); //resource route
Route::get('/product/edit{category}',[ProductController::class,'edit']); 
Route::put('/product/update{category}',[ProductController::class,'update']); 
Route::put('/product/delete{category}',[ProductController::class,'destroy']);
Route::get('/product-status{category}',[ProductController::class,'change_status']);

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
Route::resource('/size/',SizeController::class); //resource route
Route::get('/size/edit{category}',[SizeController::class,'edit']); 
Route::put('/size/update{category}',[SizeController::class,'update']); 
Route::put('/size/delete{category}',[SizeController::class,'destroy']);
Route::get('/size-status{category}',[SizeController::class,'change_status']);

//color route here
Route::resource('/color/',ColorController::class); //resource route
Route::get('/color/edit{category}',[ColorController::class,'edit']); 
Route::put('/color/update{category}',[ColorController::class,'update']); 
Route::put('/color/delete{category}',[ColorController::class,'destroy']);
Route::get('/color-status{category}',[ColorController::class,'change_status']);