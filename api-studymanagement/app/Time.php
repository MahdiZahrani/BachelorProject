<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = ['user_id', 'day' , 'from' , 'to'];

    protected static $day = [
        'sat' => 'sat',
        'sun' => 'sun',
        'mon' => 'mon',
        'tue' => 'tue',
        'the' => 'thu',
        'wed' => 'wed',
        'fri' => 'fri'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
