<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $guarded = [];

    protected $table = 'internship';

    public function user()
    {
        return $this->belongsToMany(User::class, 'internship_group', 'internship_id', 'user_id');
    }

    public function dosen()
    {
        return $this->belongsTo(User::class, 'supervisor');
    }
}

