<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Residence extends Model
{
   	use SoftDeletes; 
	
    protected $table = 'residence';

 	protected $fillable = ['name_residence', 'type_residence', 'type_center', 'type_corner', 'type_penhouse', 'type_structure', 'structure', 'type_rif', 'number_rif', 'addres'];

 	 //public function Type()
       // {
         //   return $this->belongsTo('App\Models\DocumentType', 'document_type_id');
        //}
}
