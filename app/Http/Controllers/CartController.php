<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Cart;
session_start();


class CartController extends Controller
{
    public function save_cart(Request $request){
        $product_id = $request->product_id_hidden;
        $quantity =$request->quantity;
        $product_info = DB::table('tbl_product')->where('product_id',$product_id)->first();

        $cate_product = DB::table('tbl_cate_pro')->where('cate_status','1')->orderby('cate_id','desc')->get();

        //Cart::add('293ad', 'name' => 'Product 1', 'quantiy' => 1, 'price' => 9.99);

        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        //Cart::destroy();
        $data['id'] = $product_info->product_id;
        $data['quantity'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
       // $data['image'] = $product_info->product_decr;

        $data['attributes']['image'] = $product_info->product_image;
        Cart::add($data);
        return Redirect::to('/show-cart');
        //return view('pages.cart.cart')->with('category',$cate_product);

    }


    public function cart(){
        $cate_product = DB::table('tbl_cate_pro')->where('cate_status','1')->orderby('cate_id','desc')->get();
        return view('pages.cart.cart')->with('category',$cate_product);

    }
    public function check_out(){
        $cate_product = DB::table('tbl_cate_pro')->where('cate_status','1')->orderby('cate_id','desc')->get();
        return view('pages.cart.check_out')->with('category',$cate_product);
    }
    public function delete_to_cart($id){
        Cart::remove($id);
        return Redirect::to('/show-cart');

    }

}
