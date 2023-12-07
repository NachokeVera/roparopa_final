<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carrito extends Model
{
    use HasFactory;
    //protected $fillable = ['vestimenta_id','talla_id', 'cantidad'];

    public function detalleVestimenta(): BelongsTo
    {
        return $this->belongsTo(DetalleVestimenta::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function confirmados(): HasMany
    {
        return $this->hasMany(Confirmado::class);
    }
}
