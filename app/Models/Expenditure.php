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

 	];

    public function Expenditures()
    {
        return $this->belongsTo('App\Models\ExpensesDetail', 'id');
    } 

 	public function nameResidence()
    {
        return $this->belongsTo('App\Models\Residence', 'residence_coowner');
    }
    public function monthly()
    {
        return $this->belongsTo('App\Models\ExpensesDetail', 'description_monthly');
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
  
    public function typeMonth()
    {
        return $this->belongsTo('App\Models\Month', 'month');
    }

    public function EspensesDetail()
    {
        return $this->hasMany('App\Models\Structure', 'expenditure_id');
    }

    public function descriptionMonth()
    {
        return $this->belongsTo('App\Models\ExpensesDetail', 'description_monthly_id');
    }

    public function typesMoney()
    {
        return $this->belongsTo('App\Models\ExpensesDetail', 'type_money_id');
    } 
    
    public function amountMonth()
    {
        return $this->belongsTo('App\Models\ExpensesDetail', 'amount_monthly_id');
    }
}
