<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expenditure extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'expenditure';

 	protected $fillable = [
		'residence_coowner',
		'year',
		'month',
		'description_monthly',
        'type_money',
		'amount_monthly',
 	];

 	 public function nameResidence()
    {
        return $this->belongsTo('App\Models\Coowner', 'name_residence_id');
    }

    public function typeStructure()
    {
        return $this->belongsTo('App\Models\Coowner', 'type_structure_id');
    }

     public function typeMoney()
    {
        return $this->belongsTo('App\Models\TypeMoney', 'type_money');
    }

    public function typeCenter()
    {
        return $this->belongsTo('App\Models\Structure', 'structure_coowner');
    }
}
