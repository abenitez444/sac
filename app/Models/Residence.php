<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Residence extends Model
{
   	use SoftDeletes; 
	
    protected $table = 'residence';

 	protected $fillable = ['name_residence', 'type_residence', 'type_center', 'type_corner', 'type_penhouse', 'type_structure', 'structure', 'type_rif', 'number_rif', 'email_residence', 'addres'];


 	public function typeResidence()
    {
        return $this->hasOne('App\Models\Coowner',  'type_residence');
    }
}
