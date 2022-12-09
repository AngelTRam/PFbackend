<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugares-viajes', function (Blueprint $table) {
            $table->id('id_intermedia');
            $table->unsignedBigInteger('id_lugar');
            $table->unsignedBigInteger('id_viaje');
            $table->string('notas');
            $table->timestamps();

            $table->foreign('id_lugar')->references('id_lugar')->on('lugares');
            $table->foreign('id_viaje')->references('id_viaje')->on('viajes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lugares-viajes');
    }
};
