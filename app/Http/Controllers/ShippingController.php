<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Shipping;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class ShippingController extends Controller
{
    public function shipping_address(Request $req)
    {
        $data =array();
        $data['name']=$req->name;
        $data['email']=$req->email;
        $data['address']=$req->address;
        $data['city']=$req->city;
        $data['zipcode']=$req->zipcode;
        $data['mobile']=$req->mobile;

        $shipping_id=Shipping::insertGetId($data);
        Session::put('shipping_id',$shipping_id);

        return Redirect::to('/order-details');
       
    }

     public function order_details()
     {
        $categories = Category::all();
         return view('frontend.pages.order_details',compact('categories'));
     }

    //payment method receive  controller

    public function payment_method(Request $req)
    {
        $payment_method = $req->payment;
        $data = array();
        $data['payment'] = $payment_method;
        $data['status'] = 'pending';
        $payment_id = Payment::insertGetId($data);
 
        //order database insert
        $order_data =array();
        $order_data['cus_id']= Session::get('id');
        $order_data['shipping_id']= Session::get('shipping_id');
        $order_data['pay_id']= $payment_id;
        $order_data['total']= Cart::getTotal();
        $order_data['status']= 'pending';
        $order_id = Order::insertGetId($order_data);

        //order_details database insert
        $cartcollection =Cart::getContent();
        $order_details = array();
        $order_details['order_id'] = $order_id;

    foreach ($cartcollection as $cart_list) {
        
        $order_details['product_id'] = $cart_list->id;
        $order_details['product_name'] = $cart_list->name;
        $order_details['product_price'] = $cart_list->price;
        $order_details['product_sales_quantity'] = $cart_list->quantity;
        DB::table('order_details')->insert($order_details);
        

        }
        

        

       return Redirect::to('/example1');
    }


}
