<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{

    public function schedule()
    {
        $this->belongsTo(Schedule::class);
    }

    public function time()
    {
        $this->belongsTo(Time::class);
    }

    public function subject()
    {
        $this->belongsTo(Subject::class);
    }
}
