<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePlanTypeMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_type_meals', function (Blueprint $table) {
            // Drop the 'is_included' column
            $table->dropColumn('is_included');

            // Drop foreign key and change 'meal_id' to 'meal_type_id'
            $table->dropForeign(['meal_id']);
            $table->renameColumn('meal_id', 'meal_type_id');
            
            // Add the new foreign key constraint for 'meal_type_id'
            $table->foreign('meal_type_id')->references('id')->on('meal_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plan_type_meals', function (Blueprint $table) {
            // Revert changes in reverse order
            $table->dropForeign(['meal_type_id']);
            $table->renameColumn('meal_type_id', 'meal_id');
            $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');
            $table->boolean('is_included');
        });
    }
}
