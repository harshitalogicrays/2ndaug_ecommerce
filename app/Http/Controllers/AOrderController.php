<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Mail\invoicemail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

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
    public function viewinvoice($orderId){
        $order = Orders::where('id',$orderId)->first();
        return view('Admin.generateinvoice',compact('order'));
    }
    public function downloadinvoice($orderId){
        $order=Orders::find($orderId)->first();
        $data = ['order'=>$order];
        $pdf = Pdf::loadView('admin.generateinvoice',$data);
        return $pdf->download('invoice.pdf');
    }
    public function sendmail($orderId){
        $order = Orders::where('id',$orderId)->first();
        $data = ['order'=>$order];
        $pdf = Pdf::loadView('admin.generateinvoice',$data);
        $data1['pdf'] = $pdf;
        $data1['order'] =$order;
        $data1['subject']=$order->status_message;
        try{
            Mail::to($order->email)->send(new invoicemail($data1));
            return redirect('admin/orders')->with('message','mail sent');

        }
        catch(\Exception $e){
            return redirect('admin/orders')->with('message','something went wrong');
        }
    }
}
