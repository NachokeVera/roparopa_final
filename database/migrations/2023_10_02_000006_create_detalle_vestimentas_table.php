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
        Schema::create('detalle_vestimentas', function (Blueprint $table) {
            //keys
            $table->id();
            $table->unsignedBigInteger('vestimenta_id');
            $table->unsignedBigInteger('talla_id');
            //atributos
            $table->mediumInteger('cantidad');
            //foreing key
            $table->foreign('vestimenta_id')->references('id')->on('vestimentas');
            $table->foreign('talla_id')->references('id')->on('tallas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vestimenta_tallas');
    }
};
