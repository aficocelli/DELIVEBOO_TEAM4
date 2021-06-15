<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Food;
class GuestController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('guest.index', compact('users'));
    }

    public function showRestaurant($id)
    {
        $users = User::where('id', $id)->first();

        return view('guest.show', compact('users'));
    }

    public function showFood(Food $food) 
    {
        $foods = Food::where('available', 1)->get();

        dd($foods);

        return view('guest.show', compact('foods'));
    }
}
