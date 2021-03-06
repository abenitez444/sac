<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = 'balance';

 	protected $fillable = ['name_coowner_id', 'name_residence_id', 'type_residence_id', 'number_apto', 'type_structure',  'aliquot_structure', 'month', 'amount_total', 'payment', 'number_payment', 'date_payment', 'current_balance'];

}
