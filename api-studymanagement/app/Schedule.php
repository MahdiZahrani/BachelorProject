<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ["user_id","interval","from","to"];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function plans()
    {
        $this->hasMany(Plan::class);
    }
}
