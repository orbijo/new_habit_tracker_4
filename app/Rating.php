<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function habit()
    {
        return $this->belongsTo(Habit::class);
    }

    public function ratedAt()
    {
        return date('F d, Y', strtotime($this->created_at));
    }

}
