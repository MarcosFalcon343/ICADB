<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceTbl extends Model
{
    use HasFactory;

    protected $primaryKey = 'ResNo';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'ResNo',
        'ResName',
        'Rate',
    ];
}
