<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva extends Model
{
    use HasFactory;
    protected $fillable = [
        'eventos_id',
        'salas_id',
        'fecha'
    ];

    public function sala()
    {
        return $this->belongsTo(sala::class, 'salas_id');
    }
    public function evento()
    {
        return $this->belongsTo(evento::class, 'eventos_id');
    }

}
