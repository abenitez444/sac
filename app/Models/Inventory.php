<?php

namespace App\Models;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use SoftDeletes; 

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

    public function Entity()
        {
            return $this->belongsTo('App\Models\Entity', 'entity_id');
        }
}
