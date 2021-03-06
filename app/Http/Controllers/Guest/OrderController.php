<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Order;
use App\Food;
use App\User;
use Braintree;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function createOrder(Food $food, Order $order)
    {

        // $foods = Food::where('id', $food)->get();

        $order = Order::all();

        $gateway = new Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '3f58gf44rjwx3cz4',
            'publicKey' => 'xkyy5gnc8czp7f9z',
            'privateKey' => 'bf10ce31d57cec4edd1505e025f84a77'
        ]);

        $clientToken = $gateway->clientToken()->generate();

        return view('guest.order.create', compact('order', 'clientToken'));
    }

    public function storeOrder(Request $request, Food $food)
    {

        $data = $request->all();

        $request->validate([
            'fullname_guest' => 'required|string|max:100',
            'phone_guest' => 'required|numeric',
            'address_guest' => 'required|string',
            'email_guest' => 'required|string|email|max:50',
            'total' => 'required'
        ]);

        // $data['total'] = 20;

        // $data['food_id'] = [1];

        $data = $request->all();

        //dd($data['idFood']);
        $arrayFoods = $data['idFood'];
       // dd($arrayFodds);


        $foods = Food::all()->pluck('user_id');
        //$data['listaFood'] = $request->food_id;
       
        $user_id = User::where('id', $foods)->get()->toArray();
       // $arrayFodds = $data['index'];
        
        $food_id = Food::where('user_id', $user_id)->get();
        $newOrder = new Order();
        $newOrder->total = $data['total'];
        $newOrder->delivery_type = $data['delivery_type'];
        $newOrder->notes = $data['notes'];
        $newOrder->fullname_guest = $data['fullname_guest'];
        $newOrder->phone_guest = $data['phone_guest'];
        $newOrder->address_guest = $data['address_guest'];
        $newOrder->email_guest = $data['email_guest'];
        
        $newOrder->save();
        foreach($arrayFoods as $food) {
            $newOrder->foods()->attach($food);
        }
        //$newOrder->foods()->attach($food_id);

        // $product->users()->attach($user_id, ['price' => $price]);

        // $food_id = Food::select('id')->get()->toArray();

        // dd($data['total']);

        // $newOrder->
        // $nonceFromTheClient = $_POST["payment_method_nonce"];

        $gateway = new Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '3f58gf44rjwx3cz4',
            'publicKey' => 'xkyy5gnc8czp7f9z',
            'privateKey' => 'bf10ce31d57cec4edd1505e025f84a77'
        ]);

        $result = $gateway->transaction()->sale([
            'amount' => $data['total'],
            'paymentMethodNonce' => $data['payment_method_nonce'],
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        Mail::to($newOrder->email_guest)->send(new OrderMail($newOrder));


        return redirect()->route('guest.order.success', $newOrder);
    }
    public function successOrder(Order $order)
    {

        return view('guest.order.success', compact('order'));
    }
    public function paymentOrder(Request $request, Order $order)
    {
        $order = Order::all();
        $data = $request->all();

        return view('guest.order.payment', compact('order'));
    }
}
