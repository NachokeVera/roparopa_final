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
        Schema::create('confirmados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carrito_id');
            $table->unsignedBigInteger('boleta_id');
            //atributos
            $table->mediumInteger('cantidad_compras');
            //foreing key
            $table->foreign('carrito_id')->references('id')->on('carritos');
            $table->foreign('boleta_id')->references('id')->on('boletas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirmados');
    }
};
