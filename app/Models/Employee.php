<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Employee extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'employee';

 	protected $fillable = [
		'avatar',
		'name',
		'nac',
		'ci',
		'tlf',
		'mail',
		'cv'
 	];

 	protected $guarded = [
		'cv'
 	];

	 public function Nac()
	    {
	        return $this->belongsTo('App\Models\Nationality', 'nac');
	    }

}
