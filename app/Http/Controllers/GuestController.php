<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
}
