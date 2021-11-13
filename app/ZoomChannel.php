<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZoomChannel extends Model
{
    public function days()
    {
        return $this->hasMany('App\ZoomChannelDay','zoom_channel_id');
    }
}
