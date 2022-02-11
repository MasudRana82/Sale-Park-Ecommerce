<?php

namespace App\Http\Controllers;

use App\Models\Category;
class CheckoutController extends Controller
{
    public function checkout()
    {
        $categories = Category::all();
       
        // $customer_id = Customer::where('id',Session::get('id'))->first();

        return view('frontend.pages.checkout',compact('categories'));
    }
   

  
}
