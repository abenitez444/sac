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
 		'color'
 	];

 	public function task()
    {
        return $this->hasMany('App\Models\Task', 'list_id', 'id');
    }

}