<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Braintree;

class OrderController extends Controller
{
    // public function showOrder(){
    //     $orders = Order::all();

    //     return view('guest.order', compact('orders'));
    // }

    // public function storeOrder(){

    //     $gateway = new Braintree\Gateway([
    //         'environment' => 'sandbox',
    //         'merchantId' => '3f58gf44rjwx3cz4',
    //         'publicKey' => 'xkyy5gnc8czp7f9z',
    //         'privateKey' => 'bf10ce31d57cec4edd1505e025f84a77'
    //     ]);

    //     $clientToken = $gateway->clientToken()->generate();

    //     $nonceFromTheClient = $_POST["payment_method_nonce"];

    //     $result = $gateway->transaction()->sale([
    //         'amount' => '10.00',
    //         'paymentMethodNonce' => $nonceFromTheClient,
    //         'deviceData' => $deviceDataFromTheClient,
    //         'options' => [
    //             'submitForSettlement' => True
    //         ]
    //     ]);
    //     dd($nonceFromTheClient);
    //     return view('guest.order.store', compact('clientToken'));
    // }
}
