<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryProducts extends Component
{

    public $category;

    public $products = [];

    function loadPosts(){
        $this->products = $this->category->products;

        $this->emit('glider');
    }


    public function render()
    {
        return view('livewire.category-products');
    }
}
