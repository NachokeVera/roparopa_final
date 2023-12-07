<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Talla extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function detalleVestimentas(): HasMany
    {
        return $this->hasMany(DetalleVestimenta::class);
    }

}
