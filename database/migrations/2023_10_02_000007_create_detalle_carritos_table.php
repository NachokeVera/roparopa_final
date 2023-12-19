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
        Schema::create('detalle_carritos', function (Blueprint $table) {
            //keys
            $table->id();
            $table->unsignedBigInteger('detalle_vestimenta_id');
            $table->unsignedBigInteger('user_id');
            //atributos
            $table->mediumInteger('cantidad_compras');
            //foreing key
            $table->foreign('detalle_vestimenta_id')->references('id')->on('detalle_vestimentas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
