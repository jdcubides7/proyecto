<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_documento', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
        // Insertar datos después de crear la tabla


        DB::table('tipos_documento')->insert([
            ['nombre' => 'Cédula de Ciudadanía', 'descripcion' => 'Documento de identificación para ciudadanos colombianos'],
            ['nombre' => 'Cédula de Extranjería', 'descripcion' => 'Documento de identificación para extranjeros residentes en Colombia'],
            ['nombre' => 'Pasaporte', 'descripcion' => 'Documento de viaje internacional para ciudadanos colombianos'],
            ['nombre' => 'Tarjeta de Identidad', 'descripcion' => 'Documento de identificación para menores de edad en Colombia'],
        ]);
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_documento');
    }
};
