<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class HomeController extends Controller
{

    public function index()
    {
        $cate_product = DB::table('tbl_cate_pro')->where('cate_status', '1')->orderby('cate_id', 'desc')->get();
        $list_product = DB::table('tbl_product')->where('product_status', '1')->
        orderby('product_id', 'desc')->limit(4)->get();

        return view('pages.home')->with('category', $cate_product)->with('list_product', $list_product);
    }
    public function product()
    {
        $cate_product = DB::table('tbl_cate_pro')->where('cate_status', '1')->orderby('cate_id', 'desc')->get();
        $list_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'desc')->get();

        return view('pages.product')->with('category', $cate_product)->with('list_product', $list_product);
    }
    public function login(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);

        $result = DB::table('users')->where('email', $email)
        ->where('password', $password)->first();

        if ($result) {
            session()->regenerate();
        Session::put('name', $result->name);
        Session::put('id', $result->id);
            return Redirect::to('/checkout');

    } else {
        $request->session()->put('message', 'Vui long dang nhap lai!!');
        return view('welcome');
        }
    }
    public function logout(Request $request)
    {
        Session::put('name', null);
        Session::put('id', null);
    return Redirect::to('/');
    }
    public function search (Request $request)
    {
        $key = $request->key_word;
        $cate_product = DB::table('tbl_cate_pro')->where('cate_status', '1')->orderby('cate_id', 'desc')->get();
        $search_product = DB::table('tbl_product')->where('product_name', 'like', '%'.$key.'%')->get();
        return view('pages.product.search')->with('category', $cate_product)->with('search_product', $search_product);

    }
}
