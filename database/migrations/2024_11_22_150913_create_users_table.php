<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            
            $table->string('phone')->nullable();       // Adds phone column
            $table->string('address')->nullable();     // Adds address column
            
            // Foreign key columns
            $table->unsignedBigInteger('goal_id')->nullable();  // Adds goal_id as foreign key
            $table->unsignedBigInteger('role_id')->nullable();  // Adds role_id as foreign key
            $table->unsignedBigInteger('restriction_id')->nullable();  // Adds restriction_id as foreign key
            
            // Define foreign keys
            $table->foreign('goal_id')->references('id')->on('goals')->onDelete('set null');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
            $table->foreign('restriction_id')->references('id')->on('restrictions')->onDelete('set null');
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
        Schema::dropIfExists('users');
    }
}
