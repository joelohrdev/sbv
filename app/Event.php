<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
      'event_category_id',
      'name',
      'details'
    ];

    public function eventcategory()
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }

    public function eventdates()
    {
        return $this->hasMany(EventDate::class);
    }
}
