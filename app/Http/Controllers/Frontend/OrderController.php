<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function index()
    {

        $orders = Order::where('order_id', )->where('user_id', Auth::user()->id);
        return view('frontend.order', compact('orders'));
    }

}
