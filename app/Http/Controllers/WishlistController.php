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
    public function add_wishlist($id)
    {
        $customer_id = Session::get('id');
        if ($customer_id) {

        $wdata = new Wishlist();
        $wdata->user_id=Session::get('id');
        $wdata->product_id = $id;
        $wdata->save();
        notify()->success('Product successfully in wishlist!');
        return redirect()->back();
        } 
        else {
            notify()->error('Please login in your account!');
            return redirect('/login');
        }
       


    }
    public function delete($id)
    {
         $data= Wishlist::findOrFail($id)->delete();
         
        return redirect()->back();
    }
    
}
