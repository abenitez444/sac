<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Proyect extends Model
{
	use SoftDeletes; 

 	protected $fillable = [
 		'name',
 		'user_id',
 		'type_id',
 		'status_id',
 		'date_start',
 		'date_end',
 		
 	];

 	public function type()
    {
        return $this->belongsTo('App\Models\TypeProyect', 'type_id');
    }
    public function statu()
    {
        return $this->belongsTo('App\Models\Statu', 'statu_id');
    }

}
