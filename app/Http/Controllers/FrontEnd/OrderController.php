<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{

    public function index()
    {

        $Orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', "desc")->get();
        return view('frontend.orders.index', compact('Orders'));
    }

    public function show($orderId)
    {

        $order = Order::where('user_id', Auth::user()->id)->where('id', $orderId)->first();
        if ($order) {

            return view('frontend.orders.show', compact('order'));
        } else {
            return redirect()->back()->with('message', 'No Order Found');
        }
    }
}
