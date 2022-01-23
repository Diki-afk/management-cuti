<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    //change name table
	protected $table = 'tb_leaves';

    protected $fillable = [
        'leave_date', 'long_leave', 
        'description', 'employee_id'
    ];

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
