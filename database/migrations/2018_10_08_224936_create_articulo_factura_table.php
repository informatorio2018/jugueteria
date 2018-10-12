<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticuloFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo_factura', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('articulo_id');
            $table->unsignedInteger('factura_id');
           
            $table->integer('cantidad');
            $table->string('medida');
            $table->decimal('precioUnitario',8,2);
            $table->decimal('subTotal',8,2);

            $table->timestamps();
            $table->foreign('factura_id')->references('id')->on('facturas');
            $table->foreign('articulo_id')->references('id')->on('articulos');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo_factura');
    }
}
