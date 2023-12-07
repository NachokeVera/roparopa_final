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
        Schema::create('carritos', function (Blueprint $table) {
            //keys
            $table->id();
            $table->unsignedBigInteger('detalle_vestimenta_id');
            $table->unsignedBigInteger('user_id');
            //atributos
            $table->mediumInteger('cantidad_compras');
            //foreing key
            $table->foreign('detalle_vestimenta_id')->references('id')->on('detalle_vestimentas');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carritos');
    }
};
