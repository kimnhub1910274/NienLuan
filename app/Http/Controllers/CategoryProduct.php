<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
session_start();

class CategoryProduct extends Controller
{
    public function add_category_product(){
        return view('admin.add_category_product');
    }
    public function list_category_product(){
        $list = DB::table('tbl_cate_pro')->get();
        $manager = view('admin.list_category_product')->with('list_category_product',$list);
         return view('admin_dashboard')->with('admin.list_category_product',$manager);

    }
    public function save_category_product(Request $request){
        $data = array();
        $data['cate_name'] = $request->cate_pro_name;
        $data['cate_decr'] = $request->cate_pro_decr;
        $data['cate_status'] = $request->cate_pro_status;

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';

        DB::table('tbl_cate_pro')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('add-category-product');
    }
    public function on_cate(){

    }
    public function off_cate(){

    }
}
