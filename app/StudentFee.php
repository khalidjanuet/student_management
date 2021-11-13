<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentFee extends Model
{
    public function student()
    {
        return $this->belongsTo('App\Student','student_id');
    }
    public function course()
    {
        return $this->belongsTo('App\Course','course_id');
    }
    public function details()
    {
        return $this->hasMany('App\StudentFeeDetail','fee_id');
    }
    public function team_lead()
    {
        return $this->belongsTo('App\User','team_lead_id');
    }
    public function business_admin()
    {
        return $this->belongsTo('App\User','business_admin_id');
    }
}
