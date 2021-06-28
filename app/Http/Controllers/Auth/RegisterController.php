<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Type;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        // Validation
        
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'name_restaurant' => ['required', 'string', 'unique:users'],
            'phone_restaurant' => ['required', 'numeric', 'unique:users'],
            'address_restaurant' => ['required','string','unique:users'],
            'vat_number' => ['required','numeric', 'unique:users'],
            'type'=>['min:1']
            // 'image_restaurant'=> ['nullable', 'image', "mimes:jpeg,png,jpg,gif,svg", "max:2048"],
            
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        $newUser = User::Create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password' => Hash::make($data['password']),
            'name_restaurant' => $data['name_restaurant'],
            'phone_restaurant' => $data['phone_restaurant'],
            'address_restaurant' => $data['address_restaurant'],
            'vat_number' => $data['vat_number'],
            
            // 'image_restaurant' => $data['image_restaurant'],
        ]);
        
       
        if(!isset($data['type'])){

            $data['type'] = 1;

            $newUser->types()->attach($data['type']);

        }else{
            $newUser->types()->attach($data['type']);

        }

        return $newUser;
    }

    // stampo i types
    public function showRegistrationForm()
    {
        $types = Type::all();

        return view('auth.register', compact('types'));
    }
}





