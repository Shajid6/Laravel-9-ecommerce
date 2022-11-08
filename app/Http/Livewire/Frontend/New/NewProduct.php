<?php

namespace App\Http\Livewire\Frontend\New;

use App\Models\Product;
use Livewire\Component;

class NewProduct extends Component
{
    public function render()
    {

        $featuredProducts = Product::where('featured', '1')->latest()->take(15)->get();
        return view('livewire.frontend.new.new-product',compact('featuredProducts'));
    }
}
