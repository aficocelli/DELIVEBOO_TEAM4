<?php

use Illuminate\Database\Seeder;
use App\Order;
use Faker\Generator as Faker;


class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $orders = [
            [
                'id' => 1,
                'delivery_type' => 'domicilio',
                'total' => 17.50,
                'notes' => 'citofonare Brambilla',
                'date' => 2021-06-11,
                'fullname_guest' => 'Mario Rossi',
                'phone_guest' => '123456789',
                'address_guest' => 'Via della Repubblica',
                'email_guest' => 'marione@gmail.com'
            ],
            [
                'id' => 2,
                'delivery_type' => 'ritiro',
                'total' => 11.40,
                'notes' => 'senza mozzarella',
                'date' => 2021-06-11,
                'fullname_guest' => 'Klelia Romano',
                'phone_guest' => '987654321',
                'address_guest' => 'Via S.Lorenzo',
                'email_guest' => 'kleliaisonfire@gmail.com'
            ]
        ];
        foreach ($orders as $order) {
            $newOrder = new Order();
            $newOrder->id = $order['id'];
            $newOrder->delivery_type = $order['delivery_type'];
            $newOrder->total = $order['total'];
            $newOrder->notes = $order['notes'];
            $newOrder->date = $faker->date(); 
            $newOrder->delivery_time = $faker->date(); 
            $newOrder->fullname_guest = $order['fullname_guest'];
            $newOrder->phone_guest = $order['phone_guest'];
            $newOrder->address_guest = $order['address_guest'];
            $newOrder->email_guest = $order['email_guest'];
            $newOrder->save();
        }
    }
}
