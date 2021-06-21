<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Food;
use App\User;
use Braintree;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function createOrder(){

        $order = Order::all();

        // $order_id = Order::id();

        // $orders = Order::where('order_id', $order_id)->get();
        

        return view('guest.order.create', compact('order'));
    }

    public function storeOrder(Request $request, Food $food){

        $data = $request->all();

        $food_id =Food::all()->toArray();
        
        $data['total'] = 20;

        $newOrder = Order::create($data);
        
        $newOrder->foods()->attach($food_id[0]['id']);

        dd($newOrder);

        $food_id = Food::select('id')->get()->toArray();
        
    

        dd($data['total']);
        
        $newOrder->



        $gateway = new Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '3f58gf44rjwx3cz4',
            'publicKey' => 'xkyy5gnc8czp7f9z',
            'privateKey' => 'bf10ce31d57cec4edd1505e025f84a77'
        ]);

        $result = $gateway->transaction()->sale([
            'amount' => $data['total'],
            'paymentMethodNonce' =>$request->payment_method_nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        // dd($newOrder);

        $order_id = Order::select('id')->get()->toArray();

        
        // dd($order_id);

        // dd(DB::table('orders')->where('id', $order->id));
        
        $foods = Food::where('order_id', $order_id)->get();

        dd($foods);
       

        //Mail::to($newOrder->email_guest)->send(new Model($newOrder));
       

        return redirect()->route('guest.order.payment',$newOrder, compact('foods'));
    }

    public function successOrder(Order $order)
    {
        $gateway = new Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '3f58gf44rjwx3cz4',
            'publicKey' => 'xkyy5gnc8czp7f9z',
            'privateKey' => 'bf10ce31d57cec4edd1505e025f84a77'
        ]);

        // pass $clientToken to your front-end
        $clientToken = $gateway->clientToken()->generate();

        return view('guest.order.payment', compact('order', 'clientToken'));
    }
    
}
    
