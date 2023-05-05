<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();
use Ship;
use App\Models\Order;

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

}
