<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $primaryKey = 'EmpNo';
    public $incrementing = false;
    protected $keyType = 'string';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'EmpNo',
        'EmpName',
        'Department',
        'Email',
        'Phone',
        'MgrNo'
    ];


    protected $hidden = [
        'user_id',
    ];
}
