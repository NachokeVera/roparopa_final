<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Boleta extends Model
{
    use HasFactory;
    public function confirmados(): HasMany
    {
        return $this->hasMany(Confirmado::class);
    }
    //conexion FK
    
}
