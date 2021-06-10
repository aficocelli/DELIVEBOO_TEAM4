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
   
        // $newUser = new User();
        // $newUser->restaurant_id = 1;
        // $newUser->name = $faker->name();
        // $newUser->email = $faker->email();
        // $newUser->password = Hash::make('12345678');
        // $newUser->save();

    }
}
