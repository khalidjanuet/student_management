<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZoomDayDuration extends Model
{
    public function day()
    {
        return $this->belongsTo('App\ZoomChannelDay','zoom_channel_day_id');
    }
    public function tutor()
    {
        return $this->belongsTo('App\User','tutor_id');
    }
    public function student()
    {
        return $this->belongsTo('App\Student','student_id');
    }
}
