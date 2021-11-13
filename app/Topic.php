<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function student()
    {
        return $this->belongsTo('App\Student','user_id');
    }
    public function comments()
    {
        return $this->hasMany('App\TopicComment','topic_id');
    }
}
