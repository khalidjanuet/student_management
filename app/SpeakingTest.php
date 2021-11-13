<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpeakingTest extends Model
{
    public function student()
    {
        return $this->belongsTo('App\Student','student_id');
    }
    public function tutor()
    {
        return $this->belongsTo('App\User','tutor_id');
    }
}
