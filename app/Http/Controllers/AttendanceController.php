<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Session;
use App\StudentAttendance;
use App\StudentAttendanceFeedback;
use App\StudentTestSuggestion;
use Mail;
class AttendanceController extends Controller
{
    public function attendance_form()
    {
        $students = Student::where('status',1)->where('delete_status',0)->get();
        $sessions = Session::all();
        return view('backend.modules.attendance.attendance_form',compact('students','sessions'));
    }
    public function attendance_form_save(Request $request)
    {
        //dd($request);
        $students = collect([]);
        $session = "";
        $time = "";
        $has_students = 0;
        for($i = 1; $i<= $request['students']; $i++)
        {
            $a = new StudentAttendance();
            $a->student_id = $request['student_id_'.$i];
            $a->date = $request['date'];
            $a->time = $request['time'];
            $a->tutor_name = $request['tutor_name'];
            $a->session = $request['session'];
            $a->comments = $request['comment_'.$i];
            $a->save();
            $students->push($a);
            $session = $a->session;
            $time = $a->time;
            $has_students = 1;
        }
        
       
            if($has_students == 1)
            {
                  Mail::send('backend.emails.attendance_data', ['students' => $students], function ($message) use ($session,$time)
                {
                    $message->from(config('app.from'), config('app.mail_from_name'));
                    $message->subject("Attendance Record { ".$session ." } { ".$time ." }" );
                   $message->to(config('app.to_support'));
                   // $message->to("khalidjanuet@gmail.com");
                });
            }
               
        
        return  redirect()->back()->with(['saved_success' => 1]);
       
    }
    public function attendance_feedback_form()
    {
        $students = Student::where('status',1)->where('delete_status',0)->get();
        return view('backend.modules.attendance.attendance_feedback_form',compact('students'));
    }
    public function attendance_feedback_form_save(Request $request)
    {
       // dd($request);
        for($i = 1; $i<= $request['students']; $i++)
        {
            $a = new StudentAttendanceFeedback();
            $a->student_id = $request['student_id_'.$i];
            $a->date = $request['date'];
            $a->tutor_name = $request['tutor_name'];
            $a->feedback = $request['feedback_'.$i];
            $a->save();
        }
        return redirect()->back()->with(['saved_success' => 1]);
       
    }
    public function test_suggestion_form()
    {
        $students = Student::where('status',1)->where('delete_status',0)->get();
        return view('backend.modules.teacher.test_suggestion_form',compact('students'));
    }
    public function test_suggestion_form_save(Request $request)
    {
       // dd($request);
        for($i = 1; $i<= $request['students']; $i++)
        {
            $a = new StudentTestSuggestion();
            $a->student_id = $request['student_id_'.$i];
            $a->date = $request['date'];
            $a->test_type = $request['test_type_'.$i];
            $a->suggestion = $request['suggestion_'.$i];
            $a->save();
        }
        return redirect()->back()->with(['saved_success' => 1]);
       
    }
    public function attendance_sort(Request $request)
    {
       // dd($request);
        if($request->session != 0)
        $attendances = StudentAttendance::where('student_id',$request->student_id)->where('date',$request->date)->where('session','like',$request->session)->orderBy('created_at','desc')->get();
        else
        $attendances = StudentAttendance::where('student_id',$request->student_id)->where('date',$request->date)->orderBy('created_at','desc')->get();
        
        $data = "<tbody>
                <tr class='attendance-table-row'>
                    <td>Date</td>
                    <td>Time</td>
                    <td>Tutor</td>
                    <td>Session</td>
                </tr>";
        foreach($attendances as $a)
        {
            $data .= "<tr class='attendance-table-row'>
            <td>".$a->date."</td>
            <td>".$a->time."</td>
            <td>".$a->tutor_name."</td>
            <td>".$a->session."</td>
            </tr>";
        }
       $data .="</tbody>";
        return $data;
        

    }
}
