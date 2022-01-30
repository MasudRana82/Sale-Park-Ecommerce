<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $categories = Category::all();
        return view('frontend.pages.checkout',compact('categories'));
    }
}
