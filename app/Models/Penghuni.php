<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penghuni extends Model
{
    protected $fillable = [
        'apartemen_id',
        'name',
        'jenis_kelamin',
        'tanggal_lahir',
        'umur',
        'status',
        
    ];

    public function apartemen(): BelongsTo
    {
        return $this->belongsTo(Apartemen::class, 'apartemen_id');
    }
}
