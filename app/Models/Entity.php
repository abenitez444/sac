<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Entity extends Model
{
	use SoftDeletes; 
	
    protected $table = 'entity';

 	protected $fillable = ['name', 'document_type_id', 'identity', 'email', 'web', 'addres'];

 	 public function Type()
        {
            return $this->belongsTo('App\Models\DocumentType', 'document_type_id');
        }
}
