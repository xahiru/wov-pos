<?php

namespace App\Http\Livewire;

use Livewire\Component;

class XJetProduct extends Component
{
    public $product;
    
    public function mount($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.x-jet-product', ['product'=> $this->product]);
    }

    
}
