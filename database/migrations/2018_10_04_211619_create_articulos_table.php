<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codarticulo')->nullable();
            $table->string('articulo');
            $table->text('descripcion');
            $table->integer('cantidad');
            $table->integer('stockminimo');
            $table->float('precio', 8, 2);
            $table->text('foto')->nullable();

            $table->unsignedInteger('marca_id');
            $table->unsignedInteger('categoria_id');

            $table->timestamps();

            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
