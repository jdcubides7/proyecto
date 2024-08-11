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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id(); // Crea una columna de tipo BIGINT para la clave primaria
            $table->string('nombre_cliente'); // Nombre del cliente
            $table->foreignId('tipo_documento_id')->constrained('tipos_documento'); // Clave foránea a la tabla 'tipos_documento'
            $table->string('numero_documento'); // Número de documento del cliente
            $table->string('telefono_cliente')->nullable(); // Teléfono del cliente (opcional)
            $table->string('direccion_cliente')->nullable(); // Dirección del cliente (opcional)
            $table->decimal('total_venta', 10, 2); // Total de la venta
            $table->timestamp('fecha_hora')->useCurrent(); // Fecha y hora de la venta
            $table->timestamps(); // Crea columnas 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
};
