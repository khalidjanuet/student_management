<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WritingTest extends Model
{
    public function student()
    {
        return $this->belongsTo('App\Student','student_id');
    }
    public function tutor()
    {
        return $this->belongsTo('App\User','tutor_id');
    }
    public function question()
    {
        return $this->belongsTo('App\WritingTestQuestion','writing_test_question_id');
    }
}
