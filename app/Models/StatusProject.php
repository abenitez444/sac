<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusProject extends Model
{
    protected $table = 'project';

 	protected $fillable = [
 		'description',
 	];
}