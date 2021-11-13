<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function sessions()
    {
        return $this->hasMany('App\CourseSession','course_id');
    }
}
