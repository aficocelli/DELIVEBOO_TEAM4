<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Food;
use App\User;
use Braintree;

class OrderController extends Controller
{
    public function createOrder(){

        $order = Order::all();

        // $order_id = Order::id();

        // $orders = Order::where('order_id', $order_id)->get();
        

        return view('guest.order.create', compact('order'));
    }

    public function storeOrder(Request $request){

        // $foods = Food::all();

        $data = $request->all();
        $data['total'] = 20;

        $newOrder = Order::create($data);
        // dd($newOrder);
     
        // $newOrder->foods()->attach($data['foods']);

        // Mail::to($newOrder->email_guest)->send(new Model($newOrder));
       

        return redirect()->route('guest.order.success',$newOrder);
    }

    public function successOrder(Order $order)
    {
        
        return view('guest.order.success', compact('order'));
    }
    
}
    
