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
                'name' => 'Giuliano',
                'email' => 'giuliano@gmail.com',
                'password' => 'passwordGiuliano' 
            ],

            [
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
            $newUser->name = $user['name'];
            $newUser->email = $user['email'] ;
            $newUser->password = Hash::make($user['password']);
            $newUser->save(); 
        }


    }

}
