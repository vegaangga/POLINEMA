<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservation';

    protected $fillable = [
        'users_id',
        'room_id',
        'check_in',
        'check_out',
        'guest',
        'description',
        'status',
    ];

    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'room_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }
}