<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    protected $table = 'facility';

    protected $fillable = [
        'name',
        'description',
        'is_active'
    ];

    public function room_has_facility()
    {
        return $this->belongsToMany(Room::class, 'room_has_facility', 'facility_id', 'room_id');
    }
}
