<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Course;
use App\StudentFee;
use App\ListeningEvaluation;
use App\WritingEvaluation;
use App\SpeakingEvaluation;
use App\ReadingEvaluation;
use Auth;
use Mail;
class DashboardController extends Controller
{
    public function dashboard()
    {
          
        $students = Student::all()->count();
        $courses = Course::all()->count();
        $total_fees = StudentFee::where('verified',1)->sum('total');
        $remaining_fees = StudentFee::where('verified',1)->sum('remaining');
        $listening_evaluations = ListeningEvaluation::all()->count();
        $reading_evaluations = ReadingEvaluation::all()->count();
        $writing_evaluations = WritingEvaluation::all()->count(); 
        $speaking_evaluations = SpeakingEvaluation::all()->count();
        return view('backend.modules.dashboard.dashboard',compact('students','courses','total_fees','remaining_fees','listening_evaluations','reading_evaluations','writing_evaluations','speaking_evaluations'));
    }
}
