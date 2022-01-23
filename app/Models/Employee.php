<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    //change name table
	protected $table = 'tb_employees';

    protected $fillable = [
        'identification_number', 'name', 'address', 
        'date_of_birth', 'join_date'
    ];

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }


    public function getTotalLeaveAttribute() {
        //count remaining cuti based on join_date
        $now = date_create(date('Y-m-d'));
        $joinDate = date_create($this->join_date);
        $diff = (array)date_diff($now , $joinDate);
        $total = ($diff['y']*12) + $diff['m'];
        return $total;
    }
}
