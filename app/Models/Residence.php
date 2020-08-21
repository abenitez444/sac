<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Residence extends Model
{
   	use SoftDeletes; 
	
    protected $table = 'residence';

 	protected $fillable = ['name_residence', 'type_residence', 'type_center', 'aliquot_center', 'type_corner', 'aliquot_corner' ,'type_penhouse', 'aliquot_penhouse', 'type_structure', 'structure', 'aliquot_structure', 'type_rif', 'number_rif', 'email_residence', 'addres'];


 	public function typeResidence()
    {
        return $this->hasOne('App\Models\Coowner',  'type_residence');
    }

      public function typeStructu()
    {
        return $this->belongsTo('App\Models\Structure', 'type_structure_id');
    }

    public function typeCenter()
    {
        return $this->belongsTo('App\Models\Structure', 'type_center');
    }

    public function nameResidence()
    {
        return $this->belongsTo('App\Models\Residence',  'name_residence');
    }

        public function typeResidences()
    {
        return $this->belongsTo('App\Models\TypeResidence',  'type_residence');
    }


}
