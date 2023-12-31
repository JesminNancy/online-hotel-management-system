<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerOrderController extends Controller
{
    public function customer_order(){
        $orders = Order::where('customer_id',Auth::guard('customer')->user()->id)->get();
        return view('customer.orders',compact('orders'));
    }
    public function invoice($id){
        $order = Order::where('id',$id)->first();
        $orderdetail = OrderDetail::where('order_id',$id)->get();
        return view('customer.invoice',compact('order','orderdetail'));
    }
}
