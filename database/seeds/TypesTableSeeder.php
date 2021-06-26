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
            'Sushi',
            'Pizzeria',
            'Dolce',
            'Hamburger',
            'Cinese',
            'Messicano',
            'Thai',
            'Giapponese',
            'Fusion'
        ];

        foreach($types as $type){

            $newType = new Type();
            $newType->origin = $type;
            $newType->save();
        }
    }
}
