<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseSession extends Model
{
    public function course()
    {
        return $this->belongsTo('App\Course','course_id');
    }
    public function session()
    {
        return $this->belongsTo('App\Session','session_id');
    }
}
