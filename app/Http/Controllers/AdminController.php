<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Mail;
use App\Student;
use App\ZoomDayDuration;
class AdminController extends Controller
{
    public function authenticate_admin(Request $request)
    {
        
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            
            return redirect()->intended('dashboard'); 
        }
        else
            return redirect()->back()->with('authentication_error',1);
    }
    public function admin_change_password_page()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('backend.change_password',compact('user'));
    }
    public function check_old_password(Request $request)
    {
        $password = Auth::user()->password;
        if (Hash::check($request->old_password, $password))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    public function update_admin_details(Request $request)
    {
        //dd($request);
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        if($request['password'] != "")
        $user->password = bcrypt($request['password']);
        $user->save();

        return redirect()->back()->with(['update_success' => 1]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function forgot_password_page()
    {
        return view('forgot_password_page');
    }
    public function send_password_reset_email(Request $request)
    {
        $user = User::where('email',$request['email'])->first();
        if($user)
        {
            //resend the email
            $email_to = $user->email;
            Mail::send('backend.emails.user_password_reset_email', ['encrypted_id' => encrypt($user->id)], function ($message) use ($email_to)
            {
                $message->from(config('app.from'));
                $message->subject('IELTS MASTER - Reset Your Password');
                $message->to($email_to);
            });
            return redirect()->back()->with(['success' => 1, 'email' => $email_to]);
        }
        else
        {
            return redirect()->back()->with(['error' => 1, 'email' => $request['email']]);
        }
    }
    public function show_change_password_page($encrypted_id)
    {
        $id = decrypt($encrypted_id);
        $user = User::findOrFail($id);
        return view('password_change_page',compact('user'));
    }
    public function reset_password(Request $request)
    {
        $user = User::findOrFail($request['id']);
        $user->password = bcrypt($request['password']);
        $user->save();
        return redirect()->route('login')->with(['reset_success' => 1]);
    }
    public function admin_speaking_test_bookings_index()
    {
        $durations = ZoomDayDuration::where('status',1)->where('is_booked',1)->orderBy('created_at','ASC')->get();
        $tutors = User::where('role',3)->where('status',1)->get();
        return view('backend.modules.zoom.admin_bookings_index',compact('durations','tutors'));
    }
    public function assign_tutor_to_speaking_test(Request $request)
    {
        $duration = ZoomDayDuration::findOrFail($request['duration_id']);
        $duration->tutor_id = $request['tutor_id'];
        $duration->save();
        return redirect()->back()->with(['saved_success' => 1]);
    }
}
