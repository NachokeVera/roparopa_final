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
            $table->unsignedBigInteger('detalle_carrito_id');
            $table->unsignedBigInteger('boleta_id');
            //foreing key
            $table->foreign('detalle_carrito_id')->references('id')->on('detalle_carritos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('boleta_id')->references('id')->on('boletas')->onDelete('cascade')->onUpdate('cascade');
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
