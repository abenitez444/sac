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

}
