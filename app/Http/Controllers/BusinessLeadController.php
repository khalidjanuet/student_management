<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\StudentFee;
class BusinessLeadController extends Controller
{
    public function dashboard()
    {

    }
    public function payments($id)
    {
        $business_lead = User::findOrFail($id);
      
        $business_lead_payment = StudentFee::where('business_lead_id',$business_lead->id)->sum('paid');
        $business_admins = User::where('role',6)->where('is_business_administrator',1)->where('business_lead_id',$id)->get();
        foreach($business_admins as $business_admin)
        {
            $business_admin_payments[$business_admin->id] = StudentFee::where('business_lead_id',$business_lead->id)->where('business_admin_id',$business_admin->id)->sum('paid');
        }
        return view('backend.modules.user.business_lead_payments',compact('business_lead','business_admins','business_lead_payment','business_admin_payments'));
    }
}
