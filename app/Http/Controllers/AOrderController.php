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
    public function updateOrder($orderId,Request $request){
        $order = Orders::where('id',$orderId)->first();
        if($order){
            $order->update([ 'status_message'=>$request->status]);
        }
        return redirect('/admin/orders')->with('message','order status updated');
    }
}
