<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

//**MIGRACION DE TABLAS */


return new class extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tablas_sistema', function (Blueprint $table) {
            $table->increments('id'); // Crea el campo 'id' autoincremental
            $table->string('nombre_tabla', 100)->nullable(); // Crea el campo 'nombre_tabla'
            $table->timestamps(); // Agrega los campos 'created_at' y 'updated_at'
        });

        DB::table('tablas_sistema')->insert([
            ['nombre_tabla' => 'autenticacion_usuarios','created_at' => now(),'updated_at' => now()],
            ['nombre_tabla' => 'productos','created_at' => now(),'updated_at' => now()],
            ['nombre_tabla' => 'registros','created_at' => now(),'updated_at' => now()],
            ['nombre_tabla' => 'tablas_sistema','created_at' => now(),'updated_at' => now()],
            ['nombre_tabla' => 'users','created_at' => now(),'updated_at' => now()],
            // Añade más registros si es necesario
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tablas_sistema');
    }
};
