<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->tinyInteger('daysPerWeek')->unsigned();
            $table->decimal('price', 8, 2);
            $table->unsignedBigInteger('goal_id'); 
            $table->unsignedBigInteger('plan_type_id');

            $table->foreign('goal_id')->references('id')->on('goals')->onDelete('cascade');
            $table->foreign('plan_type_id')->references('id')->on('plan_types')->onDelete('cascade');
            
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
        //
    }
}
