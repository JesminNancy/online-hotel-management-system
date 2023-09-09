<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Room;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index(){
        $total_completed_order = Order::where('status','Completed')->count();
        $total_pending_order = Order::where('status','Pending')->count();
        $total_active_customer = Customer::where('status', 1)->count();
        $total_pending_customer = Customer::where('status', 0)->count();
        $total_rooms = Room::count();
        $total_subscriber = Subscriber::where('status',1)->count();
        $orders = Order::OrderBy('id','desc')->skip(0)->take(5)->get();
        return view ('admin.home',compact('total_completed_order','total_pending_order','total_active_customer','total_pending_customer','total_subscriber','total_rooms','orders'));
    }
}
