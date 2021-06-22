<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Food;
use App\Type;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class FoodController extends Controller
{
    protected $validation = [
        'name_food' => 'required|string|max:150',
        'price' => 'required|max:99.99|regex:/^\d+(\.\d{1,2})?$/|max:5',
        'ingredients'=> 'required|string',
        'description'=> 'required',
        'food_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
 
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();

        
        $foods = Food::where('user_id', $user_id)->get();


        return view('admin.foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::id();

        

        $foods = Food::where('user_id', $user_id)->get();

        return view('admin.foods.create', compact('foods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        
        // validation
        $validation = $this->validation;
        $request->validate($validation);
        $data = $request->all();
        // checkbox
        $data['available'] = !isset($data['available']) ? 0 : 1;
        $data['vegan'] = !isset($data['vegan']) ? 0 : 1;
        // verificata autenticazione
        $data['user_id'] = $user->id;

        if (isset($data['food_image'])) {
            $data['food_image'] = Storage::disk('public')->put('images', $data['food_image']);
        }
        // insert
        $newFood = Food::create($data);
        // redirect
        return redirect()->route('admin.foods.index')->with('message', 'Il menu è stato creato!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        return view('admin.foods.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food )
    {
        $validation = $this->validation;
        $request->validate($validation);
        $data = $request->all();
        // checkbox
        $data['available'] = !isset($data['available']) ? 0 : 1;
        $data['vegan'] = !isset($data['vegan']) ? 0 : 1;
        if (isset($data['food_image'])) {
            $data['food_image'] = Storage::disk('public')->put('images', $data['food_image']);
        }
        $food->update($data);
        
        return redirect()->route('admin.foods.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->route('admin.foods.index');
    }
}
 