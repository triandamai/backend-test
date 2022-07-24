<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodPressuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_pressures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('medical_id');
            $table->string('systole')->nullable();
            $table->string('disatole')->nullable();
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
        Schema::dropIfExists('blood_pressures');
    }
}
