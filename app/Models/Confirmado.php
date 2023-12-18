<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Confirmado extends Model
{
    use HasFactory;

    protected $fillable = [
        'boleta_id',
        'detalle_carrito_id',
    ];

    public function boleta(): BelongsTo
    {
        return $this->belongsTo(Boleta::class);
    }
    public function detalleCarrito(): BelongsTo
    {
        return $this->belongsTo(DetalleCarrito::class,'talla_id');
    }

}
