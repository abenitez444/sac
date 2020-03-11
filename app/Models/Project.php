<?php
 
namespace App\Models;
 
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
 
class Project extends Model
{
    use SoftDeletes;

    protected $table = 'project';
 
    protected $fillable = [
        'name',
        'date_start',
        'date_end',
        'entity_id',
        'status_id',
        'cost'
    ];
 
 
    public function StatusProject()
    {
        return $this->belongsTo('App\Models\StatusProject', 'status_id');
    }
}