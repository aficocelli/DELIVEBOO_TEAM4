<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function showOrder(){
        $orders = Order::all();

        return view('guest.order', compact('orders'));
    }

    public function storeOrder(){


    }
}
