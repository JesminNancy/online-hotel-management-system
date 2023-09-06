<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerHomeController extends Controller
{
    public function index(){
        $total_completed_order = Order::where('status','Completed')->count();
        $total_pending_order = Order::where('status','Pending')->count();
        return view('customer.home',compact('total_completed_order','total_pending_order'));
    }

}
