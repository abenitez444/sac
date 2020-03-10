<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Entity extends Model
{
	use SoftDeletes; 
	
    protected $table = 'entity';

 	protected $fillable = ['name'];

}