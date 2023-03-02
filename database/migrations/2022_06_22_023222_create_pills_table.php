<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pills', function (Blueprint $table) {
            $table->id();

            // $table->foreignId('user_id');
            $table->string('name');
            $table->string('username');
            $table->string('type')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('howManyWeeks')->nullable();
            $table->integer('howManyDays')->nullable();
            $table->string('medicineForm')->nullable();
            
            $table->dateTime('schedule')->nullable();
            
            $table->integer('takeit')->nullable();
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pills');
    }
}
