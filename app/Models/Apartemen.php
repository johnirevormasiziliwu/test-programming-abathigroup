<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartemen extends Model
{
    protected $fillable  = 
    [
        'nomor_apartemen',
        'lantai_apartemen',
        'status',
    ];
}
