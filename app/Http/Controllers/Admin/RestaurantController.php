<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Food;
use App\User;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    protected $validation = [
        'name_restaurant' => 'required|string|unique:restaurants',
        'phone_restaurant' => 'required|string|unique:restaurants',
        'address_restaurant' => 'required|string|unique:restaurants',
        'vat_number' => 'required|string|unique:restaurants'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // $restaurants = Restaurant::all();

        
        // return view('welcome', compact('restaurants'));
        
        
        


        // $foods = Food::all()->where('restaurant_id', $user_id)->get();

         
        // return view('welcome', compact('user_id'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //validazione
        $validation = $this->validation;
        $request->validate($validation);

        //prendo i dati inseriti dall'utente
        $data = $request->all();
        $data['user_id'] = Auth::id(); 

        // Insert
        $newRestaurant = Restaurant::create($data);


        return redirect()->route('admin.restaurants.show')->with('message', 'Il ristorante è stato creato!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {   

        

        $user_id = Auth::id();


        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
