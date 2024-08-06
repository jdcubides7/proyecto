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
       
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); // Campo de identificación principal (id)
            $table->string('nombre'); // Nombre del cliente
            $table->unsignedBigInteger('tipo_documento_id'); // id del tipo de documento
            $table->string('numero_documento'); // Número del documento
            $table->string('telefono')->nullable(); // Teléfono del cliente
            $table->string('direccion')->nullable(); // Dirección del cliente
            $table->string('email')->nullable(); // Correo electrónico del cliente
            $table->timestamps(); // Campos de marcas de tiempo (created_at y updated_at)

            $table->foreign('tipo_documento_id')->references('id')->on('tipos_documento');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    
    {

        Schema::table('clientes', function (Blueprint $table) {
            $table->dropForeign(['tipo_documento_id']);
        });

        Schema::dropIfExists('clientes');
    }
};
