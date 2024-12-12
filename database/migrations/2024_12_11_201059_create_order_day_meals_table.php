<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDayMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_day_meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_day_id')->constrained()->onDelete('cascade'); // FK to order_days table
            $table->foreignId('meal_id')->constrained()->onDelete('cascade'); // FK to meals table
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
        Schema::dropIfExists('order_day_meals');
    }
}
