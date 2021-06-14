<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\User;
use App\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {
        $user = Auth::user();

        $user_id = Auth::id();
       
        $foods = Food::where('user_id', $user_id)->get();
    
        $data = User::all()->where('id');

        return view('admin.users.index', compact('data', 'user', 'foods'));
    }
}
