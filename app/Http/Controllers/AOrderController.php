<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class AOrderController extends Controller
{
    public function index(){
        $orders = Orders::paginate(3);
        return view('Admin.orders.orders',compact('orders'));
    }
    public function vieworder($orderId){
        $order = Orders::where('id',$orderId)->first();
        return view('Admin.orders.vieworder',compact('order'));
    }
}
