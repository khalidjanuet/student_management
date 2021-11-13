<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function course()
    {
        return $this->belongsTo('App\Course','course_id');
    }

    public function class()
    {
        return $this->belongsTo('App\StudentClass','class_id');
    }
    public function courses()
    {
        return $this->hasMany('App\StudentCourse','student_id');
    }
    
    public function section()
    {
        return $this->belongsTo('App\StudentSection','section_id');
    }
    public function wes()
    {
        return $this->hasMany('App\WritingEvaluation','student_id')->orderBy('created_at','DESC');
    }
    public function res()
    {
        return $this->hasMany('App\ReadingEvaluation','student_id')->orderBy('created_at','DESC');
    }
    public function les()
    {
        return $this->hasMany('App\ListeningEvaluation','student_id')->orderBy('created_at','DESC');
    }
    public function ses()
    {
        return $this->hasMany('App\SpeakingEvaluation','student_id')->orderBy('created_at','DESC');
    }
    

}
