<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use KirschbaumDevelopment\NovaMail\Traits\Mailable;

class EventDate extends Model
{

    protected $dates = [
        'date',
    ];

    protected $fillable = [
      'event_id',
      'date',
      'time',
      'attended',
      'notes'
    ];

    public function eventdateable()
    {
        return $this->morphTo();
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
