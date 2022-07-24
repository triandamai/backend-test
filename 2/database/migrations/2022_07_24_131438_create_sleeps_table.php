<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSleepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sleeps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('medical_id');
            $table->time('sleepStart')->nullable();
            $table->time('sleepEnd')->nullable();
            $table->integer('deepSleep')->nullable();
            $table->integer('lightSleep')->nullable();
            $table->integer('wakeTime')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('medical_id')->nullable()->unsigned()->change();
            $table->foreign('medical_id')->references('id')->on('medical_records')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sleeps');
    }
}
