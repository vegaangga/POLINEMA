<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'room';

    protected $fillable = [
        'room_type_id',
        'name',
        'price',
        'image',
        'description',
        'is_active'
    ];

    public function room_type()
    {
        return $this->belongsTo('App\Models\RoomType', 'room_type_id');
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'room_has_facility', 'room_id', 'facility_id');
    }
}