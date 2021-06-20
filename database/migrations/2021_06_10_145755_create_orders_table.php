<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('delivery_type', 100);
            $table->float('total', 6, 2);
            $table->text('notes');
            $table->dateTime('date', 0)->nullable();
            $table->dateTime('delivery_time', 0)->nullable();;
            $table->string('fullname_guest', 100);
            $table->string('phone_guest', 20);
            $table->string('address_guest');
            $table->string('email_guest', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
