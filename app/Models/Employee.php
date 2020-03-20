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
		'document_type_id',
		'ci',
		'phone',
		'email',
		'curriculum'
 	];

 	protected $guarded = [
		'curriculum'
 	];

	 public function DocumentType()
	    {
	        return $this->belongsTo('App\Models\DocumentType', 'document_type_id');
	    }

}
