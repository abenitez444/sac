<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $fillable = [
        'cod_estado', 
        'cod_municipio',             
        'cod_parroquia',
        'nacionalidad',
        'cedula_identidad',
        'apellidos_nombres',
        'fec_nacimiento',
        'estado_civil',
        'sexo',
        'centro_nuevo',
        'centro_viejo'
    ];

    protected $table = 'registro';

    public $timestamps = false;

    /* protected $dates = [
        'fec_nacimiento',
       
    ]; */
}
