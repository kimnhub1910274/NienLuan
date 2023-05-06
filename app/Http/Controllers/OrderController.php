<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();
use App\Models\Ship;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Customer;

class OrderController extends Controller
{
    public function ordered($customerId){
        return view('pages.cart.ordered')
        ;
    }
    public function manage_order()
    {
        $all_order = Order::orderBy('created_at', 'DESC')->get();
        return view('admin.manage_order')->with(compact('all_order'));
    }
    public function view_order($order_id)
    {
        $order_details = OrderDetails::with('product')->where('order_id', $order_id)->get();
        $order = Order::where('order_id', $order_id)->get();

        foreach($order as $key => $value){
            $customer_id = $value->customer_id;
            $ship_id = $value->ship_id;
        }
        $customer = Customer::where('customer_id', $customer_id)->first();
        $ship = Ship::where('ship_id', $ship_id)->first();
        $order_details_product = OrderDetails::with('product')->where('order_id', $order_id)->get();

        return view('admin.view_order')->with(compact('order_details', 'customer', 'ship', 'order'));
    }
    public function update_quantity_order(Request $request)
    {
        $data = $request->all();
        $order = Order::find($data['order_id']);
        $order->order_status = $data['order_status'];
        $order->save();
    }

}
