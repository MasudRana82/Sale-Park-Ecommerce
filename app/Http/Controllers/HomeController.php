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
use DB;

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

        //top selling products
        $top_sales =DB::table('products')
                    ->leftJoin('order_details','products.id','=','order_details.product_id') //products table  er id er sathe order_details er product_id  er join kora hoice
                    ->selectRaw('products.id, SUM(order_details.product_sales_quantity) as total') //specipic product_id jotobar sell hoice ta count korbe
                    ->groupBy('products.id') 
                    ->orderBy('total','desc')
                    ->take(8) // take 8 data
                    ->get();
            $top_products=[]; //array nici
            foreach ($top_sales as $s) {
               $p = Product::findOrFail($s->id); //find top product
               $p->totalQty= $s->total;
                $top_products[] =$p;
            }

        return view('frontend.welcome',compact('categories','subcategories','colors','sizes','brands','units','products', 'top_products'));
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
        //top selling products
        $top_sales = DB::table('products')
        ->leftJoin('order_details', 'products.id', '=', 'order_details.product_id') //products table  er id er sathe order_details er product_id  er join kora hoice
        ->selectRaw('products.id, SUM(order_details.product_sales_quantity) as total') //specipic product_id jotobar sell hoice ta count korbe
        ->groupBy('products.id')
        ->orderBy('total', 'desc')
        ->take(3) // take 8 data
            ->get();
        $top_products = []; //array nici
        foreach ($top_sales as $s) {
            $p = Product::findOrFail($s->id); //find top product
            $p->totalQty = $s->total;
            $top_products[] = $p;
        }
       
        return view('frontend.pages.product_by_cat', compact('categories', 'subcategories', 'brands', 'products', 'top_products'));

    }
    public function product_by_subcat($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $products = Product::where('subcat_id',$id)->where('status',1)->limit(12)->get();
        //top selling products
        $top_sales = DB::table('products')
        ->leftJoin('order_details', 'products.id', '=', 'order_details.product_id') //products table  er id er sathe order_details er product_id  er join kora hoice
        ->selectRaw('products.id, SUM(order_details.product_sales_quantity) as total') //specipic product_id jotobar sell hoice ta count korbe
        ->groupBy('products.id')
        ->orderBy('total', 'desc')
        ->take(3) // take 8 data
            ->get();
        $top_products = []; //array nici
        foreach ($top_sales as $s) {
            $p = Product::findOrFail($s->id); //find top product
            $p->totalQty = $s->total;
            $top_products[] = $p;
        }
        return view('frontend.pages.product_by_subcat', compact('categories', 'subcategories', 'brands', 'products', 'top_products' ));

    }
    public function product_by_brand($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $products = Product::where('br_id',$id)->where('status',1)->limit(12)->get();
        //top selling products
        $top_sales = DB::table('products')
        ->leftJoin('order_details', 'products.id', '=', 'order_details.product_id') //products table  er id er sathe order_details er product_id  er join kora hoice
        ->selectRaw('products.id, SUM(order_details.product_sales_quantity) as total') //specipic product_id jotobar sell hoice ta count korbe
        ->groupBy('products.id')
        ->orderBy('total', 'desc')
        ->take(3) // take 8 data
        ->get();
        $top_products = []; //array nici
        foreach ($top_sales as $s) {
            $p = Product::findOrFail($s->id); //find top product
            $p->totalQty = $s->total;
            $top_products[] = $p;
        }
        return view('frontend.pages.product_by_brand', compact('categories', 'subcategories', 'brands', 'products', 'top_products' ));

    }

    public function search(Request $req)
    {
        $products = Product::orderBy('id','desc')->where('name','LIKE','%'.$req->product.'%'); // LIKE used in a Search Technic. //ei condition e all data cole asce
        if($req->category!="ALL") $products->where('cat_id',$req->category); // ei condition e  categorir sathe mil rekhe product dekhano hoyece

        $products = $products->get(); //get all data with previous condition

        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        //top selling products
        $top_sales = DB::table('products')
        ->leftJoin('order_details', 'products.id', '=', 'order_details.product_id') //products table  er id er sathe order_details er product_id  er join kora hoice
        ->selectRaw('products.id, SUM(order_details.product_sales_quantity) as total') //specipic product_id jotobar sell hoice ta count korbe
        ->groupBy('products.id')
        ->orderBy('total', 'desc')
        ->take(3) // take 8 data
            ->get();
        $top_products = []; //array nici
        foreach ($top_sales as $s) {
            $p = Product::findOrFail($s->id); //find top product
            $p->totalQty = $s->total; 
            $top_products[] = $p;
        }
        
        return view('frontend.pages.product_by_cat', compact('categories', 'subcategories', 'brands', 'products', 'top_products'));

    }
}
