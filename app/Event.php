<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
      'eventcategory_id',
      'name',
      'details'
    ];

    public function eventcategory()
    {
        return $this->belongsTo(EventCategory::class);
    }

    public function eventdates()
    {
        return $this->hasMany(EventDate::class);
    }
}
