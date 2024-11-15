<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Orders;
use Livewire\Component;
use App\Models\OrderItems;
use Illuminate\Support\Str;

class CheckoutShow extends Component
{
    public $fullname,$email,$phone,$address,$pincode;
    public $totalAmount,$carts;
    public $payment_mode,$payment_id=null;

    public function rules(){
        return [
            'fullname'=>'required|string|max:121',
            'email'=>'required|email',
            'phone'=>'required|string|min:10|max:10',
            'pincode'=>'required|string|min:6|max:6',
            'address'=>'required|string|max:500'
        ];
    }
    protected $listeners=['validationForAll','transactionEmit'=>'paidOnlineOrder'];
    public function validationForAll(){
        $this->validate();
    }
    public function mount(){
        $this->email =  auth()->user()->email;
        $this->fullname = auth()->user()->name;
    }
    public function totalCartAmount(){
        $this->totalAmount=0;
        $this->carts=Cart::where('user_id',auth()->user()->id)->get();
        foreach($this->carts as $cartItem){
            $this->totalAmount += $cartItem->product->selling_price * $cartItem->quantity; 
        }
        return $this->totalAmount;
    }
    public function placeOrder(){
        $this->validate();
        $order=Orders::create([
            'user_id'=>auth()->user()->id,
            'tracking_no'=>Str::random(10),
            'fullname'=>$this->fullname,'email'=>$this->email,
            'phone'=>$this->phone,'pincode'=>$this->pincode,
            'address'=>$this->address,
            'status_message'=>'in progress',
            'payment_mode'=>$this->payment_mode,
            'payment_id'=>$this->payment_id
        ]);
        foreach($this->carts as $cartItem){
            $orderItem=OrderItems::create([
                'order_id'=>$order->id,
                'product_id'=>$cartItem->product_id,
                'quantity'=>$cartItem->quantity,
                'price'=>$cartItem->product->selling_price
            ]);
        }
        return $order;
    }

    public function codorder(){
        $this->payment_mode="Cash on Delivery";
        $codorder=$this->placeOrder();
        if($codorder){
          Cart::where('user_id',auth()->user()->id)->delete();
          $this->emit('cartAddedOrUpdated');
          $this->dispatchBrowserEvent('message', [
              'text' => "Order Placed",
              'type'=>'success',
              'status'=>200            
          ]);
          return redirect()->to('thank-you');
      }
      else {
          $this->dispatchBrowserEvent('message', [
              'text' => "something went wrong",
              'type'=>'error',
              'status'=>404           
          ]);
      }
    }

    public function paidOnlineOrder($payment_id){
        $this->payment_mode="Online";
        $this->payment_id= $payment_id;
        $onlineorder=$this->placeOrder();
        if($onlineorder){
          Cart::where('user_id',auth()->user()->id)->delete();
          $this->emit('cartAddedOrUpdated');
          $this->dispatchBrowserEvent('message', [
              'text' => "Order Placed",
              'type'=>'success',
              'status'=>200            
          ]);
          return redirect()->to('thank-you');
      }
      else {
          $this->dispatchBrowserEvent('message', [
              'text' => "something went wrong",
              'type'=>'error',
              'status'=>404           
          ]);
      }
    }
    public function render()
    {   
        $this->totalAmount = $this->totalCartAmount();
        return view('livewire.checkout-show',['totalAmount'=>$this->totalAmount]);
    }
}
