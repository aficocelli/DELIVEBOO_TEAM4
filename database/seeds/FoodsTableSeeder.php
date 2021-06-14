<?php

use Illuminate\Database\Seeder;
use App\Food;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = [
            [
                
                'name_food' => 'pizza',
                'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.buttalapasta.it%2Fricette%2Fricetta-hamburger-americano-tradizionale%2F25325%2F&psig=AOvVaw1SyweUS3xqFYgbu6j6xV7-&ust=1623488307418000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCOjN_rGbj_ECFQAAAAAdAAAAABAD',
                'ingredients' => 'acqua, farina, pomodoro, mozzarella, basilico',
                'price' => 6.50,
                'vegan' => 0,
                'description' => 'una pizza margherita form da block, very buona',
                'available' => 1
            ],
            [
               
                'name_food' => 'hamburger',
                'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fcookidoo.it%2Frecipes%2Frecipe%2Fit-IT%2Fr652170&psig=AOvVaw3xsJgv-0KenGLyO_DcSTb-&ust=1623488286374000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCOiaraibj_ECFQAAAAAdAAAAABAD',
                'ingredients' => 'pane, cipolla, lattuga, pomodoro, carne',
                'price' => 4.50,
                'vegan' => 0,
                'description' => 'un panino very scrauso',
                'available' => 1
            ]
        ];
        foreach ($foods as $food) {
            $newFood = new Food();
            $newFood->restaurant_id = $food['restaurant_id'];
            $newFood->name_food = $food['name_food'];
            $newFood->image = $food['image'];
            $newFood->ingredients = $food['ingredients'];
            $newFood->price = $food['price'];
            $newFood->vegan = $food['vegan'];
            $newFood->description = $food['description'];
            $newFood->available = $food['available'];
            $newFood->save();
        }
    }
}
