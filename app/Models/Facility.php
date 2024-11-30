<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    protected $primaryKey = 'FacNo';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'FacNo',
        'FacName'
    ];
}
