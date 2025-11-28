<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'rows',
        'seats_per_row',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}
