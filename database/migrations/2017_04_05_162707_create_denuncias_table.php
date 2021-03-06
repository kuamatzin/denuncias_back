<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDenunciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denuncias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nombre_denuncia')->nullable();
            $table->string('descripcion')->nullable();
            $table->text('imagenes')->nullable();
            $table->text('videos')->nullable();
            $table->string('nombre')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('email')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->text('direccion1')->nullable();
            $table->text('direccion2')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('estado')->nullable();
            $table->string('municipio')->nullable();
            $table->datetime('fecha')->nullable();
            $table->boolean('anonima');
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
        Schema::dropIfExists('denuncias');
    }
}
