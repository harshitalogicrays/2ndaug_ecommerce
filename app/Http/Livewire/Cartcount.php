<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Cartcount extends Component
{
    public $cartCount;
    protected $listeners =['cartAddedOrUpdated'=>'checkcartcount'];
    public function checkcartcount(){
        if(Auth::check()){
            return Cart::where('user_id',auth()->user()->id)->count();
        }
        return 0;
    }
    public function render()
    {   
        $this->cartCount = $this->checkcartcount();
        return view('livewire.cartcount');
    }
}
