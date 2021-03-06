<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Type;
use App\Food;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    public function searchTypes(Request $request) 
    {
        //Prendo i dati del ristoratore
        $types = Type::all();
     

        //risposta in json
        return response()->json($types);
    
    }

    public function searchUsers(Request $request)
    {

      $users = User::with(['types'])->get();
     

      return response()->json($users);

    }
    // seleziona le tipologie di cibo
    public function selectTypes (Request $request)
    {


    $restaurants = User::all();


    $restaurantsFind = collect();
    // aggiungiamo il campo categories ad ogni ristorante nel file json
      foreach ($restaurants as $restaurant) {
        

        if ($restaurant->types->contains('id', $request->type)) {

          $restaurantsFind->add($restaurant);
        }
      }

      // $restaurants->categories->contains($request->category);
      //Response in Json

      return response()->json($restaurantsFind);
    }

  //Api che filtra i ristoranti per categoria
  public function filteredApi($type)
  {

    
    if ($type != "All") {
      $restaurants = User::whereHas('types', function ($query) use ($type) {
        $query->where('origin', $type);
      })->get();
    } else {
      $restaurants = User::all();
    }


    foreach ($restaurants as $restaurant) {
      $types = [];
      $types = $restaurant->types;
      $restaurant->types = $types;
    };

    return response()->json($restaurants);
  }

  public function filteredName(Request $request)
  {
    // query per nome dei ristoranti
    $restaurantName = User::where('name_restaurant', 'like', '%' . $request->name_restaurant . '%')->get();    
    return response()->json($restaurantName);
   
  }

  public function searchFoods(Request $request) 
  {
    $foods = User::with(['foods'])->get();

    return response()->json($foods);

  }
  public function onlyFoods(Request $request)
  {
    $onlyFoods = Food::all();

    return response()->json($onlyFoods);
  }


  public function smallSelUsers(Request $request)
  {
    // query piccola selezione ristoranti in index totale

    $smallSelection = User::limit(12)->get();
    // $smallSelection = User::all()->limit(5)->get();
    // dd($smallSelection);
    // $posts = Post::where('published', 1)->orderBy('date', 'asc')->limit(5)->get();

    return response()->json($smallSelection);
  }


}
