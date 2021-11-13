<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    public function student()
    {
        return $this->belongsTo('App\Student','student_id');
    }
    public function course()
    {
        return $this->belongsTo('App\Course','course_id');
    }
}
