<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodpressuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // nanti dimasukkan ke colom value yg di tabel medical (WHERE type=BLOODPRESS)
        Schema::create('bloodpressures', function (Blueprint $table) {
            $table->id();
            $table->string('systole')->nullable();
            $table->string('disatole')->nullable();
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
        Schema::dropIfExists('bloodpressures');
    }
}
