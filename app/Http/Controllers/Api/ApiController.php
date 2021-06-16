<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\type;
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


}
