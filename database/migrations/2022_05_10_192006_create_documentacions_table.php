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
        Schema::create('documentacions', function (Blueprint $table) {
            $table->id();
            $table->integer('id_documento');
            $table->string('tipo',50);
            $table->string('titulo', 250);
            $table->string('descripcion', 1500);
            $table->string('archivo', 250);
            $table->string('solucion', 1500);
            $table->string('proceso', 250);
            $table->string('link', 250);
            $table->string('autor', 100);
            $table->integer('activo');
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
        Schema::dropIfExists('documentacions');
    }
};
