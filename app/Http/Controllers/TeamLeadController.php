<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\StudentFee;
class TeamLeadController extends Controller
{
    public function dashboard()
    {

    }
    public function payments($id)
    {
        $team_lead = User::findOrFail($id);
        $business_admins = User::where('is_business_administrator',1)->where('team_lead_id',$id)->get();
        foreach($business_admins as $business_admin)
        {
            $payments[$business_admin->id] = StudentFee::where('business_admin_id',$business_admin->id)->sum('paid');
        }
        $team_lead_total_payment = StudentFee::where('team_lead_id',$team_lead->id)->sum('paid');
        
        return view('backend.modules.user.team_lead_payments',compact('team_lead','business_admins','payments','team_lead_total_payment'));
    }
    public function business_admin_payments($id)
    {
        $business_admin = User::findOrFail($id);
        $students = StudentFee::where('business_admin_id',$business_admin->id)->get();
       
        return view('backend.modules.user.business_admin_payments',compact('business_admin','students'));
    }
}
