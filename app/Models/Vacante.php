<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'imagen',
        'descripcion',
        'ultimo_dia',
        'salario_id',
        'categoria_id',
        'empresa',
        'user_id'
    ];
}
