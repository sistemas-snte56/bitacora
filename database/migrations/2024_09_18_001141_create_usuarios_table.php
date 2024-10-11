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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_delegacion');
            $table->unsignedBigInteger('id_tema');
            $table->string('nombre',250)->nullable();
            $table->string('apaterno',250)->nullable();
            $table->string('amaterno',250)->nullable();
            $table->unsignedBigInteger('id_genero');
            $table->string('rfc',250)->nullable();
            $table->string('curp',250)->nullable();
            $table->string('npersonal',250)->nullable();
            $table->string('email', 255)->unique()->nullable();
            $table->string('telefono',250)->nullable();
            $table->string('folio',250)->nullable();
            $table->string('dirección',250)->nullable();
            $table->string('cp',250)->nullable();
            $table->string('ciudad',250)->nullable();
            $table->string('estado',250)->nullable();
            $table->timestamps();

            $table->foreign('id_delegacion')->references('id')->on('delegaciones');
            $table->foreign('id_tema')->references('id')->on('temas');
            $table->foreign('id_genero')->references('id')->on('genero');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
