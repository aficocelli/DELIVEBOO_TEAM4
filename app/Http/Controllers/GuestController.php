<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Type;
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
        $types = Type::all();

        $users = User::where('id', $id)->first();

        $foods = Food::where('available', 1)->where('user_id', $id)->get();

        foreach ($foods as $food) {
            $food->price = number_format($food->price, 2);
        } 

        if ($users == null) {
            abort(404);
        }

        return view('guest.show', compact('users', 'foods', 'types'));
    }


    // public function showFood(Food $food) 
    // {
    //     $foods = Food::where('available', 1)->get();

    //     dd($foods);

    //     return view('guest.show', compact('foods'));
    // }

}
