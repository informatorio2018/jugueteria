<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('RazonSocial');
           
            $table->string('NroDocumento');
            $table->string('DireccionFiscal');
            $table->string('CodigoPostal');

            $table->boolean('PercibeIVA');

            $table->boolean('PercibeIIBB');

            $table->string('CondicionPago');
           
            $table->boolean('EnviarComprobante');

            $table->string('MailFacturacion')->nullable();
           
            $table->string('Telefono');
            $table->boolean('Estado');
            $table->text('foto')->nullable();

            $table->unsignedInteger('id_documento');
            $table->unsignedInteger('id_tratamiento');


            $table->timestamps();

            $table->foreign('id_documento')->references('id')->on('documentos');
            $table->foreign('id_tratamiento')->references('id')->on('tratamientos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
