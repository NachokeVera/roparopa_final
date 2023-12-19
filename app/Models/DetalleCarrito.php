<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetalleCarrito extends Model
{
    use HasFactory;
    protected $fillable = [
        'detalle_vestimenta_id',
        'user_id',        
        'cantidad_compras',
    ];

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
