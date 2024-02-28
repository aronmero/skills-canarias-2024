<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'comensales',
        'fecha', 'usuario_id'

    ];
    public function eventos()
    {
        return $this->belongsToMany(sala::class, 'reservas', 'eventos_id', 'salas_id');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
