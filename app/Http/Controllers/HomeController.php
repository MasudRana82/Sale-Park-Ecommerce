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
        $products=Product::where('status',1)->latest()->limit(12)->get();
        return view('frontend.welcome',compact('categories','subcategories','colors','sizes','brands','units','products'));
    }
    public function view_details($id)
    { 
        $products = Product::findOrFail($id);
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $colors = Color::find($products->color_id);
        $sizes = Size::find($products->size_id);
        $units = Unit::all();
        $cat_id=$products->cat_id;
        $related_product=Product::where('cat_id',$cat_id)->limit(4)->get();
       
        return view('frontend.pages.view-details', compact('categories', 'subcategories', 'colors', 'sizes', 'brands', 'units', 'products', 'related_product'));
    }
    
    public function product_by_cat($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $products = Product::where('cat_id',$id)->where('status',1)->limit(12)->get();
       
        return view('frontend.pages.product_by_cat', compact('categories', 'subcategories', 'brands', 'products'));

    }
    public function product_by_subcat($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $products = Product::where('subcat_id',$id)->where('status',1)->limit(12)->get();
        return view('frontend.pages.product_by_subcat', compact('categories', 'subcategories', 'brands', 'products' ));

    }
    public function product_by_brand($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $products = Product::where('br_id',$id)->where('status',1)->limit(12)->get();
        return view('frontend.pages.product_by_brand', compact('categories', 'subcategories', 'brands', 'products' ));

    }
}
