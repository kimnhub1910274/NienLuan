<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
session_start();
class AdminController extends Controller
{
    public function index()
    {
       return view('admin_login');
    }

    public function show_dashboard()
    {
       return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)
        ->where('admin_password',$admin_password)->first();

        if($result){
            session()->regenerate();
           Session::put('admin_name', $result->admin_name);
           Session::put('admin_id', $result->admin_id);


            return Redirect::to('/dashboard');
        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
        }else{
            $request->session()->put('message','Vui long dang nhap lai!!');
            return Redirect::to('/admin');
        }
    }
    public function logout(Request $request){
        Session::put('admin_name',null);
        Session::put('admin_id', null);
     return Redirect::to('/admin');
    }

}