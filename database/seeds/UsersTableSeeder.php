<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $users = [
            [
                'id' => 2,
                'restaurant_id' => 2,
                'name' => 'Giuliano',
                'email' => 'giuliano@gmail.com',
                'password' => 'passwordGiuliano' 
            ],

            [
                'id' => 3,
                'restaurant_id' => 3,
                'name' => 'Antonello',
                'email' => 'antonello@gmail.com',
                'password' => 'passwordAntonello'
            ]
        ];

        // $newUser = new User();
        // $newUser->id = 1;
        // $newUser->restaurant_id = 1;
        // $newUser->name = 'Piero';
        // $newUser->email = 'piero@gmail.com';
        // $newUser->password = Hash::make('password');
        // $newUser->save(); 

        foreach ($users as $user) {
            $newUser = new User();
            $newUser->id = $user['id'];
            $newUser->restaurant_id = $user['restaurant_id'];
            $newUser->name = $user['name'];
            $newUser->email = $user['email'] ;
            $newUser->password = Hash::make($user['password']);
            $newUser->save(); 
        }


    }

}
