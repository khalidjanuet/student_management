<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WritingTestQuestion extends Model
{
    public function course()
    {
        return $this->belongsTo('App\Course','course_id');
    }
}
