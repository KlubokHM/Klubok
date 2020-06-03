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
            $table->increments('id');
            $table->tinyInteger('status')->default(0);
            $table->string('first_name')->nullable();
            $table->string('second_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mail')->nullable();
            $table->string('City')->nullable();
            $table->string('street')->nullable();
            $table->string('building')->nullable();
            $table->string('rome_number')->nullable();
            $table->integer('index')->nullable();
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
