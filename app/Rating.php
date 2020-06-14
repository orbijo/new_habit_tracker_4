<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
<<<<<<< Updated upstream
    public function habit()
    {
        return $this->belongsTo(Habit::class);
    }

    public function ratedAt()
    {
        return date('F d, Y', strtotime($this->created_at));
    }

=======
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = ['rating'];
>>>>>>> Stashed changes
}
