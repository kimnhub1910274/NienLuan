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
    public function login()
    {
        $cate_product = DB::table('tbl_cate_pro')->where('cate_status', '1')->orderby('cate_id', 'desc')->get();
        return view('pages.checkout.login')->with('category', $cate_product);
    }
    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_address'] = $request->customer_address;
        $data['customer_password'] = $request->customer_password;

        $customer_id = DB::table('tbl_customers')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        return view('pages.checkout.check_out');
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
        $data['order_name'] = $request->order_name;
        $data['order_phone'] = $request->order_phone;
        $data['order_address'] = $request->order_address;
        $data['order_note'] = $request->order_note;

        $order_id = DB::table('tbl_orders')->insertGetId($data);
        Session::put('order_id', $order_id);
        Cart::clear();
        return Redirect::to('/check-out');
    }


}
