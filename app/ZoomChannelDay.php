<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZoomChannelDay extends Model
{
    public function durations()
    {
        return $this->hasMany('App\ZoomDayDuration','zoom_channel_day_id');
    }
    public function channel()
    {
        return $this->belongsTo('App\ZoomChannel','zoom_channel_id');
    }
}
