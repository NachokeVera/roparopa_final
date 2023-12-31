<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vestimenta extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['imagen','nombre', 'descripcion', 'precio','categoria_id'];
    //uno a muchos
    public function detalleVestimentas(): HasMany
    {
        return $this->hasMany(DetalleVestimenta::class);
    }
    //pertenece
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

}

