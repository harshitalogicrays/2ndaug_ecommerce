<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Viewproduct extends Component
{   
    public $category,$product,$qtyCount=1;
    public function mount($category,$product){
        $this->category = $category;
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.viewproduct');
    }
}
