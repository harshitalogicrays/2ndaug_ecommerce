<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Orders::where('user_id',auth()->user()->id)->get();
        return view('MyOrders',compact('orders'));
    }
    public function vieworder($orderId){
        $order = Orders::where('user_id',auth()->user()->id)->where('id',$orderId)->first();
        return view('ViewOrder',compact('order'));
    }
}
