<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Food;
use App\Type;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $validation = [
        'phone_restaurant' => 'required|numeric',
        'vat_number' => 'required|numeric',
        'food_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ];
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
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
    public function edit(User $user)
    {
        $user_id = Auth::id();
        $types = Type::all();

        if ($user->id != $user_id) {
            abort('403');
        }

        return view('admin.users.edit', compact('user', 'types'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {   
        $validation = $this->validation;

        $request->validate($validation);

        $data = $request->all();
        // controllo se utente è autorizzato a modifica
        $user_id = Auth::id();
        //errore autenticazione
        if ($user->id != $user_id) {
            abort('403');
        }
        
        // controllo immagine
       
        if (isset($data['image_restaurant'])) {

            $data['image_restaurant'] = Storage::disk('public')->put('images', $data['image_restaurant']);

        }
        
        //salvo le modifiche
        $user->update($data);

        // controllo types

        if (!isset($data['types'])) {
            $data['types'] = 1;
        }
        $user->types()->sync($data['types']);
        
        return redirect()->route('home', $user)->with('message', 'Il ristorante ' . $user->name_restaurant . ' è stato modificato!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('register')->with('message', 'L\'account di ' .$user->name. 'è stato eliminato');
    }
}
