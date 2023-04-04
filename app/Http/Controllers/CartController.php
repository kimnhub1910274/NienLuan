<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();


class CartController extends Controller
{
    public function save_cart(Request $request){
        $cate_product = DB::table('tbl_cate_pro')->where('cate_status','1')->orderby('cate_id','desc')->get();

        $product_id = $request->product_id_hidden;
        $quantity =$request->quantity;
        $product_info = DB::table('tbl_product')->where('product_id',$product_id)->get();

        Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        return view('pages.cart.cart')->with('category',$cate_product);

    }
}
