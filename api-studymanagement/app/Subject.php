<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ["user_id" , "subject" , "priority"];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
