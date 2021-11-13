<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentFeeDetail extends Model
{
    public function fee()
    {
        return $this->belongsTo('App\StudentFee','fee_id');
    }
}
