<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvailabilityToPlansTable extends Migration
{
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->boolean('availability')->default(true); 
        });
    }
    
    public function down()
    {
        Schema::table('pans', function (Blueprint $table) {
            $table->dropColumn('availability'); 
        });
    }
}
