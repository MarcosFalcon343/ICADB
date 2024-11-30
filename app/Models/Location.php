<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $primaryKey = 'LocNo';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'LocNo',
        'FacNo',
        'LocName',
    ];
}
