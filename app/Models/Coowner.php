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
		'avatar',
		'name',
		'aliquot',
		'saldo',
		'code_phone_id',
		'phone',
		'email',
 	];

	public function CodePhone()
	    {
	        return $this->belongsTo('App\Models\CodePhone', 'code_phone_id');
	    }
}
