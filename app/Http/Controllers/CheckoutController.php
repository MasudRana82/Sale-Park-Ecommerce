<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Session;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $categories = Category::all();
        $shipping = Shipping::all();
        $customer_id = Customer::where('id',Session::get('id'))->first();

        return view('frontend.pages.checkout',compact('categories', 'shipping','customer_id'));
    }
   

  
}
