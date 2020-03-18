<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Lists extends Model
{
	use SoftDeletes;
    protected $table = 'lists';


 	protected $fillable = [
 		'name',
 		'project_id',
 		'order',
 		'color'
 	];

 	public function Activity()
    {
        return $this->hasMany('App\Models\Activity', 'list_id', 'id');
    }

}