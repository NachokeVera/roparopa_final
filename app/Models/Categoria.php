<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Categoria extends Model
{
    use HasFactory;
    public function vestimentas(): HasMany
    {
        return $this->hasMany(Vestimenta::class);
    }
}

