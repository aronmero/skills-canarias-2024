<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sala extends Model
{
    use HasFactory;
    protected $fillable = [
        'nonbre',
        'minimo',
        'aforo'
    ];

    public function eventos()
    {
        return $this->belongsToMany(evento::class, 'reservas', 'eventos_id', 'salas_id');
    }
}
