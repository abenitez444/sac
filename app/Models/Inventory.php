<?php

namespace App\Models;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{

    protected $table = 'inventory';

 	protected $fillable = [
            'dependencia',
            'ubicacion',
            'responsable',
            'codigo_interno',
            'descripcion',
            'serial',
            'modelo',
            'marca',
            'cantidad',
            'especificacion',
            'detalle',
            'entity_id'
    ];
}
