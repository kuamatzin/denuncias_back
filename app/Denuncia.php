<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    protected $table = 'denuncias';

    protected $fillable = ['nombre_denuncia', 'descripcion', 'imagenes', 'videos', 'nombre', 'apellidos', 'email', 'latitud', 'longitud', 'anonima'];

     protected $casts = [
        'imagenes' => 'array',
        'videos' => 'array'
    ];

}
