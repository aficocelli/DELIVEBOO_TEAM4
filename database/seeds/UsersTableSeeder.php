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
    public function run(Faker $faker)
    {   
        // $users = [
        //     [
        //         'name' => 'Giuliano',
        //         'email' => 'giuliano@gmail.com',
        //         'password' => 'passwordGiuliano' 
        //     ],

        //     [
        //         'name' => 'Antonello',
        //         'email' => 'antonello@gmail.com',
        //         'password' => 'passwordAntonello'
        //     ]
        // ];

        // $newUser = new User();
        // $newUser->id = 1;
        // $newUser->restaurant_id = 1;
        // $newUser->name = 'Piero';
        // $newUser->email = 'piero@gmail.com';
        // $newUser->password = Hash::make('password');
        // $newUser->save(); 

        for ($i = 0; $i < 5; $i++) {
            $newUser = new User();
            $newUser->name = $faker->name();
            $newUser->email = $faker->email();
            $newUser->password = Hash::make($faker->password(8, 10));
            $newUser->name_restaurant = $faker->company();
            $newUser->phone_restaurant = $faker->phoneNumber();
            $newUser->address_restaurant = $faker->address();
            $newUser->vat_number = $faker->numerify('p.iva-###########');
            $newUser->image_restaurant = $faker->imageUrl(360, 360, 'animals', true);
            $newUser->save(); 
        }


    }

}
