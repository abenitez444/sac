<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpensesDetail extends Model
{
    protected $table = 'expenses_detail';

    protected $fillable = [
           'description_monthly',
           'type_money',
           'amount_monthly',
           'expenditure_id'
   ];

   public function Expenditure()
    {
        return $this->belongsTo('App\Models\ExpensesDetail', 'expenditure_id');
    }
   
    public function Type_money()
    {
        return $this->belongsTo('App\Models\TypeMoney', 'type_money');
    }
}
