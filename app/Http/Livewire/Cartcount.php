<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cartcount extends Component
{
    public $cartCount;
    public function checkcartcount(){
        return 0;
    }
    public function render()
    {   
        $this->cartCount = $this->checkcartcount();
        return view('livewire.cartcount');
    }
}
