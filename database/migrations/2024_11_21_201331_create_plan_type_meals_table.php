<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanTypeMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_type_meals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id'); // Foreign key for plans
            $table->unsignedBigInteger('meal_id'); // Foreign key for meals
            $table->boolean('is_included'); // To indicate inclusion

            // Foreign key constraints
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');
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
        Schema::dropIfExists('plan_type_meals');
    }
}
