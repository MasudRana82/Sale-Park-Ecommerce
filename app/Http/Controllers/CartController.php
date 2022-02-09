<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $quantity = $request->quantity;
        $id = $request->id;
        $products = Product::where('id',$id)->first();
        $data['quantity'] = $quantity;
        $data['id'] = $products->id;
        $data['name'] = $products->name;
        $data['price'] = $products->price;
        $data['attributes'] = [$products->image];

        Cart::add($data); //session er modde data rakhlam

        cardArray();

        return redirect()->back();

    }
    public function delete($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }
   
}
