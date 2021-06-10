<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Restaurant;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {


        for($i = 0; $i <= 9; $i++){

            $newRestaurant = new Restaurant();
            $newRestaurant->name_restaurant = $faker->company();
            $newRestaurant->phone_restaurant = $faker->phoneNumber();
            $newRestaurant->address_restaurant = $faker->address();
            $newRestaurant->vat_number = $faker->numerify('p.iva-###########');
            $newRestaurant->save();
        }
    }
}
