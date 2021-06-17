<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Type;
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

      $users = User::all();
      return response()->json($users);

    }

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


}
