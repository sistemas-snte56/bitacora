<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bitacora', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('id_dependencia');
            $table->string('motivo')->nullable(); // Columna motivo
            $table->date('fecha_salida')->nullable(); // Columna para fecha
            $table->time('hora')->nullable(); // Columna para hora
            $table->date('fecha_llegada')->nullable(); // Columna para fecha
            $table->boolean('status')->default(false); // Columna para confirmar si está concluido
            $table->text('observacion', 1000)->nullable(); // Agrega un campo 'observaciones'

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_dependencia')->references('id')->on('dependencia');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bitacora');
    }
};
