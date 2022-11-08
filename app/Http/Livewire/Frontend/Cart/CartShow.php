<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Cart;

class CartShow extends Component
{
    public $cart,$totalPrice=0;


    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            $cartData->decrement('quantity');
            $this->dispatchBrowserEvent("message", [
                'text' => 'Quantity Updated',
                'type' => 'success',
                'status' => 200
            ]);
        } else {
            $this->dispatchBrowserEvent("message", [
                'text' => 'Something Went Wrong!',
                'type' => 'error',
                'status' => 484
            ]);
        }
    }

    public function incrementQuantity(int $cartId)
    {

        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            $cartData->increment('quantity');
            $this->dispatchBrowserEvent("message", [
                'text' => 'Quantity Updated',
                'type' => 'success',
                'status' => 200
            ]);
        } else {
            $this->dispatchBrowserEvent("message", [
                'text' => 'Something Went Wrong!',
                'type' => 'error',
                'status' => 484
            ]);
        }
    }
    public function removeCart(int $cartId)
    {



        $cart = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cart) {
            $cart->delete();
            $this->dispatchBrowserEvent("message", [
                'text' => 'Cart deleted Successfully',
                'type' => 'success',
                'status' => 200
            ]);
        } else {
            $this->dispatchBrowserEvent("message", [
                'text' => 'Something Went Wrong!',
                'type' => 'error',
                'status' => 484
            ]);
        }
    }


    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart
        ]);
    }
}
