<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Italiano',
            'Pizzeria',
            'Sushi',
            'Hamburger',
            'Dolce',
            'Cinese',
            'Messicano',
            'Thai',
            'Fusion',
            'Giapponese'
        ];

        foreach($types as $type){

            $newType = new Type();
            $newType->origin = $type;
            $newType->save();
        }
    }
}
