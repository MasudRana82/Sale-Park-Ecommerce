<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shipping;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function manage_orders()
    {
        $orders =Order::all();

        return view('admin.order.manage_order_page',compact('orders'));
    }
    public function order_view($id)
    {
        
        $orders = Order::find($id);
        $order_details = OrderDetail::where('order_id',$id)->get();
        
        return view('admin.order.view_order',compact('orders', 'order_details' ));
    }
    public function invoice($id)
    {

        $orders = Order::find($id);
        $order_details = OrderDetail::where('order_id', $id)->get();
        return view('frontend.pages.invoice', compact('orders', 'order_details'));
    }
}
