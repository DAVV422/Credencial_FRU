<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credencial extends Model
{
    use HasFactory;

    protected $table = 'credencials';
    protected $fillable = [
        'nombre', 'apellido', 'estado','grado', 'grupo_sanguineo', 'foto', 'genero', 'celular', 'fecha_nacimiento', 'carnet_identidad'
    ];
    protected $primaryKey = 'id_credencial';        
}
