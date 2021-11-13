<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicComment extends Model
{
    public function topic()
    {
        return $this->belongsTo('App\Topic','topic_id');
    }
    public function student()
    {
        return $this->belongsTo('App\Student','student_id');
    }
    public function replies()
    {
        return $this->hasMany('App\TopicCommentReply','comment_id');
    }
}
