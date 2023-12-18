<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Boleta extends Model
{
    protected $fillable = [
        'fecha_venta',
        'total_venta',
    ];

    use HasFactory;
    public function confirmado(): HasMany
    {
        return $this->hasMany(Confirmado::class);
    }
    //conexion FK
    
}
