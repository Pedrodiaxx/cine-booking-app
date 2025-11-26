<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
use App\Models\Room;

class Ticket extends Model
{
    protected $fillable = [
        'code',
        'movie_id',
        'room_id',
        'show_time',
        'price',
        'seat'
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}



