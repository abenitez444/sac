<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coowner extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'coowner';

 	protected $fillable = [
		'name',
		'name_residence_id',
		'type_residence_id',
		'number_letters',
		'type_structure_id',
		'aliquot',
		'code_phone_id',
		'phone',
		'email',
 	];

	public function CodePhone()
    {
        return $this->belongsTo('App\Models\CodePhone', 'code_phone_id');
    }

    public function nameResidence()
    {
        return $this->belongsTo('App\Models\Residence', 'name_residence_id');
    }

    public function typeStructure()
    {
        return $this->belongsTo('App\Models\Residence', 'type_structure_id');
    }
	
}
