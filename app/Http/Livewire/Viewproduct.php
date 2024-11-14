<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Viewproduct extends Component
{   
    public $category,$product,$qtyCount=1;
    public function mount($category,$product){
        $this->category = $category;
        $this->product = $product;
    }
    public function incrementQty(){
        if($this->qtyCount < $this->product->qty){
            $this->qtyCount++;
        }
    }
    public function decrementQty(){
        if($this->qtyCount > 1){
            $this->qtyCount--;
        }
        else  $this->qtyCount = 1;
    }
    public function addToCart($productid){
        if(Auth::check()){
            if($this->product->where('id',$productid)->where('status','0')->exists()){
                Cart::create([
                    'user_id'=>auth()->user()->id,
                    'product_id'=>$productid,
                    'quantity'=>$this->qtyCount
                ]);
                $this->emit('cartAddedOrUpdated');
                $this->dispatchBrowserEvent('message',[
                    'text'=>'product added to cart',
                    'type'=>'success','status'=>200
                ]);
            }
        }
        else{
            $this->dispatchBrowserEvent('message',[
                'text'=>'Please Login First',
                'type'=>'error','status'=>400
            ]);
        }
    }

    public function render()
    {
        return view('livewire.viewproduct');
    }
}
