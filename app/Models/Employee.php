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
		'code_phone_id',
		'phone',
		'email',
		'curriculum'
 	];

 	protected $guarded = [
		'curriculum'
 	];


	 public function DocumentType()
    {
        return $this->belongsTo('App\Models\DocumentType');
    }
        public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }

	public function CodePhone()
    {
        return $this->belongsTo('App\Models\CodePhone', 'code_phone_id');
    }

}
