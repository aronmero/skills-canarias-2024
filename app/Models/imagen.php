<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imagen extends Model
{
    use HasFactory;
    protected $fillable = [
        'salas_id',
        'ruta'
    ];
    protected $table = 'imagenes';

    public function sala()
    {
        return $this->belongsTo(sala::class, 'sala_id');
    }
}
