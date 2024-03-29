<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class CategoryProduct extends Controller
{
    public function add_category_product()
    {
        return view('admin.add_category_product');
    }

    public function list_category_product()
    {
        $list = DB::table('tbl_cate_pro')->get();
        $manager = view('admin.list_category_product')->with('list_category_product', $list);

        return view('admin_dashboard')->with('admin.list_category_product', $manager);
    }

    public function save_category_product(Request $request)
    {
        $data = [];
        $data['cate_name'] = $request->cate_pro_name;
        $data['cate_decr'] = $request->cate_pro_decr;
        $data['cate_status'] = $request->cate_pro_status;

        DB::table('tbl_cate_pro')->insert($data);
        Session::put('message', 'Thêm thành công');

        return Redirect::to('add-category-product');
    }

    public function on_cate($category_id)
    {

        DB::table('tbl_cate_pro')->where('cate_id', $category_id)->update(['cate_status'=>0]);
        Session::put('message', 'Không hiện sản phẩm');
        return Redirect::to('list-category-product');
    }

    public function off_cate($category_id)
    {
        DB::table('tbl_cate_pro')->where('cate_id', $category_id)->update(['cate_status'=>1]);
        Session::put('message', 'Hiện sản phẩm');
        return Redirect::to('list-category-product');
    }
    public function edit_category_product($category_id)
    {
        $edit_category_product = DB::table('tbl_cate_pro')->where('cate_id', $category_id)->get();
        $manager_cate = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);

        return view('admin_dashboard')->with('admin.edit_category_product', $manager_cate);
    }
    public function update_category_product(Request $request, $category_id)
    {
        $data = array();
        $data['cate_name'] = $request->cate_pro_name;
        $data['cate_decr'] = $request->cate_pro_decr;
        DB::table('tbl_cate_pro')->where('cate_id', $category_id)->update($data);
        Session::put('message', 'Cập nhật danh mục thành công');
        return Redirect::to('list-category-product');

    }
    public function delete_category_product($category_id)
    {

        DB::table('tbl_cate_pro')->where('cate_id', $category_id)->delete();
        Session::put('message', 'Xóa danh mục thành công');
        return Redirect::to('list-category-product');

    }
    //end admin
    //category product - home
    public function show_cate_home($cate_id)
    {
        $cate_product = DB::table('tbl_cate_pro')->where('cate_status', '1')->orderby('cate_id', 'desc')->get();
        $cate_by_id = DB::table('tbl_product')
        ->join('tbl_cate_pro', 'tbl_product.category_id', '=', 'tbl_cate_pro.cate_id')
        ->where('tbl_cate_pro.cate_id', $cate_id)->get();
        $cate_name = DB::table('tbl_cate_pro')->where('tbl_cate_pro.cate_id', $cate_id)->limit(1)->get();
        return view('pages.category.show_cate')->with('category', $cate_product)
        ->with('cate_by_id', $cate_by_id)->with('cate_name', $cate_name);
    }

}
