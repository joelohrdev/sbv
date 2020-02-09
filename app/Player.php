<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'coach',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eventdates()
    {
        return $this->morphMany(EventDate::class, 'eventdateable');
    }
}
