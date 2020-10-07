<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = [
        'cod_estado',
        'des_estado',
        'cod_municipio',
        'des_municipio',
        'cod_parroquia',
        'des_parroquia',
        'codigo',
        'nombre',
        'direccion',
        'mesa',
        'terminal_desde',
        'terminal_hasta',
        'votantes_evento',
        'tecnologia'
    ];

    protected $table = 'data';

    public $timestamps = false;
/* 
    protected $dates = [
        'created_at',
       
    ]; */
}
