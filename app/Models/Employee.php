<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Employee extends Model
{
    use SoftDeletes;
    protected $table = 'employee';


 	protected $fillable = [
		'name',
		'ci',
		'tlf',
		'mail'
 	];

 	protected $guarded = [
		'cv'
 	];


}
