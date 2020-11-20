<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = ['user_id', 'day' , 'from' , 'to'];

    public static $day = [
        'sat' => 'شنبه',
        'sun' => 'یکشنبه',
        'mon' => 'دوشنبه',
        'tue' => 'سه شنبه',
        'the' => 'چهارشنبه',
        'wed' => 'پنج شنبه',
        'fri' => 'جمعه'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
