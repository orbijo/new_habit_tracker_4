<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function dateCreated()
    {
        return date('F d, Y', strtotime($this->created_at));
    }

    public function firstRating(){
        return $this->hasOne(Rating::class)->oldest();
    }

}
