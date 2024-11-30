<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $primaryKey = 'CustNo';
    public $incrementing = false;
    protected $keyType = 'string';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'CustNo',
        'CustName',
        'Address',
        'Internal',
        'Contact',
        'Phone',
        'City',
        'State',
        'ZipCode',

    ];

    protected $hidden = [
        'user_id',
    ];
}
