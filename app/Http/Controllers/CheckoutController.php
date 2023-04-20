<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Cart;
session_start();

class CheckoutController extends Controller
{
    public function login_checkout()
    {
        $cate_product = DB::table('tbl_cate_pro')->where('cate_status', '1')->orderby('cate_id', 'desc')->get();
        return view('pages.checkout.login')->with('category', $cate_product);
    }
    public function sign_up()
    {
        $cate_product = DB::table('tbl_cate_pro')->where('cate_status', '1')->orderby('cate_id', 'desc')->get();
        return view('pages.checkout.sign_up')->with('category', $cate_product);
    }
    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_address'] = $request->customer_address;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('tbl_customers')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        Session::put('customer_phone', $request->customer_phone);
        Session::put('customer_address', $request->customer_address);

        return view('pages.checkout.check_out');
    }
    public function login()
    {
        $cate_product = DB::table('tbl_cate_pro')->where('cate_status', '1')->orderby('cate_id', 'desc')->get();
        return view('pages.checkout.login')->with('category', $cate_product);
    }
    public function login_customer(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);

        $result = DB::table('tbl_customers')->where('customer_email', $email)
        ->where('customer_password', $password)->first();
        if ($result) {
            session()->regenerate();
            Session::put('customer_name', $result->customer_name);
            Session::put('customer_id', $result->customer_id);
            Session::put('customer_phone', $result->customer_phone);
            Session::put('customer_address', $result->customer_address);

            return Redirect::to('/home');
        } else {
            return Redirect::to('/login_checkout');
        }
    }

    public function check_out()
    {
        $cate_product = DB::table('tbl_cate_pro')->where('cate_status', '1')->orderby('cate_id', 'desc')->get();
        return view('pages.checkout.check_out')->with('category', $cate_product);
    }
    public function delete_to_checkout($id)
    {
        Cart::remove($id);
        return Redirect::to('/check-out');
    }
    public function save_checkout(Request $request)
    {
        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['ship_name'] = $request->ship_name;
        $data['ship_phone'] = $request->ship_phone;
        $data['ship_address'] = $request->ship_address;
        $data['ship_note'] = $request->ship_note;

        $ship_id = DB::table('tbl_ship')->insertGetId($data);
        Session::put('ship_id', $ship_id);

       // $content = Cart::getContent();
       //echo $content;

        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['ship_id'] = Session::get('ship_id');
        $order_data['order_total'] = Cart::getTotal();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('tbl_orders')->insertGetId($order_data);

        //insert order_detail
        $content = Cart::getContent();
        foreach ( $content as $value){
            $orders_data = array();
            $orders_data['order_id'] = $order_id;
            $orders_data['product_id'] = $value->id;
            $orders_data['product_name'] = $value->name;
            $orders_data['product_price'] = $value->price;
            $orders_data['product_quantity'] = $value->quantity;
             DB::table('tbl_order_details')->insert($orders_data);
        }


        Cart::clear();
        return view('pages.cart.cart');
    }
    public function order(Request $request)
    {
        //insert order


        return Redirect::to('/cart');
    }
    public function log_out()
    {
        Session::flush();
        return Redirect::to('/login');
    }



}