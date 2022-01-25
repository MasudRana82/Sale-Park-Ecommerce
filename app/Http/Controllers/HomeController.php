<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;
use App\Models\Unit;

class HomeController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $colors=Color::all();
        $sizes=Size::all();
        $units=Unit::all();
        $products=Product::where('status',1)->latest()->limit(10)->get();
        return view('frontend.welcome',compact('categories','subcategories','colors','sizes','brands','units','products'));
    }
}
