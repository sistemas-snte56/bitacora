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
        Schema::create('delegaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_region');
            $table->string('deleg_delegacional', 150);
            $table->string('nivel_delegacional', 150);
            $table->string('sede_delegacional', 150);
            
            $table->foreign('id_region')->references('id')->on('regiones');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delegaciones');
    }
};
