<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Wishlist;
use Session;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function wishlist()
    {
        $categories = Category::all();
        $id = Session::get('id');
        $wdata = Wishlist::where('user_id',$id)->get();

        return view('frontend.pages.wishlist', compact('categories', 'wdata'));
    }
    public function add_wishlist(Request $req)
    {
        $wdata = new Wishlist();
        $wdata->user_id=Session::get('id');
        $wdata->product_id = $req->id;
        $wdata->save();
        return redirect()->back();


    }
    public function delete($id)
    {
         $data= Wishlist::findOrFail($id)->delete();
         
        return redirect()->back();
    }
    
}