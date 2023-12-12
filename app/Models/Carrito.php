<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carrito extends Model
{
    use HasFactory;


    public function boleta(): BelongsTo
    {
        return $this->belongsTo(Boleta::class);
    }
    public function Carrito(): BelongsTo
    {
        return $this->belongsTo(Carrito::class,'talla_id');
    }

}
