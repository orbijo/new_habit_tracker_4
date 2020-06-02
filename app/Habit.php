<?php

namespace App;

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

}
