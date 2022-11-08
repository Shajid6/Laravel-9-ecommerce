<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
       public function index(){
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('frontend.checkout.index', [
            'cart' => $cart
        ]);
}
}