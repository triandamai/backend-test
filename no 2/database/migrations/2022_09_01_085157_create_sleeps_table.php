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
        // nanti dimasukkan ke colom value yg di tabel medical (WHERE type=SLEEP)
        Schema::create('sleeps', function (Blueprint $table) {
            $table->id();
            $table->time('sleepStart')->nullable();
            $table->time('sleepEnd')->nullable();
            $table->integer('deepSleep')->nullable();
            $table->integer('lightSleep')->nullable();
            $table->integer('wakeTime')->nullable();
            $table->timestamps();

            $table->foreignId('medical_id')->constrained();
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
