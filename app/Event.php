<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
      'category_id',
      'name',
      'details'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function eventdates()
    {
        return $this->hasMany(EventDate::class);
    }
}
