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
        $cate_product = DB::table('tbl_cate_pro')->where('cate_status','1')->orderby('cate_id','desc')->get();
        $list_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(4)->get();

        return view('pages.home')->with('category',$cate_product)->with('list_product',$list_product);
    }
}
