<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Activity extends Model
{
	use SoftDeletes;
    protected $table = 'activity';


 	protected $fillable = [
 		'name',
 		'description',
 		'order',
 		'list_id',
 		'date_end'
 	];

}
