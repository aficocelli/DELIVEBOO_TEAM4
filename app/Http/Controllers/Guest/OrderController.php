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
    public function createOrder(Food $food){

        
        // $foods = Food::where('id', $food)->get();

        $order = Order::all();

        
        

        return view('guest.order.create', compact('order'));
    }

    public function storeOrder(Request $request, Food $food){
        
        $data = $request->all();

        $data['total'] = 20;
        
        // $data['food_id'] = [1];

        $foods = Food::all()->pluck('user_id');

        
        foreach($foods as $food){
            
            $user_id = User::where('id', $food)->get()->toArray();
            
        }

        

        $food_id= Food::where('user_id', $user_id)->get();

        
        $newOrder = Order::create($data);
        
        $newOrder->foods()->attach($food_id);

       
        // $product->users()->attach($user_id, ['price' => $price]);

        // $food_id = Food::select('id')->get()->toArray();
        
    

        // dd($data['total']);
        
        // $newOrder->



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


        //Mail::to($newOrder->email_guest)->send(new Model($newOrder));
       

        return redirect()->route('guest.order.success',$newOrder);
    }

    public function successOrder(Order $order)
    {
       

        return view('guest.order.success', compact('order'));
    }

    public function paymentOrder(Order $order){

        $order = Order::all();
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
    
