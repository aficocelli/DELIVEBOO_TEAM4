<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\User;
use App\Food;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Order $order)
    {   

        // $order = Order::all();
        
        $user = Auth::user();

        

        $user_id = Auth::id();

        
       
        $foods = Food::where('user_id', $user_id)->get();


        // $orders = DB::table('users')
        // ->join('foods', 'users.id', '=', 'foods.user_id')
        // ->join('orders', 'users.id', '=', 'orders.id')
        // ->get();



        $orders = DB::table('orders')->select('orders.id AS order_id',  DB::raw("CONVERT(orders.total, CHAR) AS totale"), 'orders.created_at as created_at', 'orders.email_guest as email_guest', 'orders.notes as notes')
        ->join('food_order', 'food_order.order_id', '=', 'orders.id')
        ->join('foods', 'foods.id', '=', 'food_order.food_id')
        ->where('user_id', $user_id )
        ->groupBy('orders.id',  'orders.total', 'orders.created_at', 'orders.email_guest', 'orders.notes')->get();        // dd($orders);
    
 //dd($orders);

        $data = User::all()->where('id');
        
        return view('admin.users.index', compact('data', 'user', 'foods', 'orders'));
    }
}
