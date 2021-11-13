<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WritingTestQuestion;
use App\Course;
use App\Session;
use App\ZoomChannel;
use App\ZoomChannelDay;
use App\ZoomDayDuration;
use App\Student;
use App\StudentSpeakingTest;
use App\WritingTest;
use PDF;
use Storage;
use Validator;
use App\WritingEvaluation;
use Auth;
use Carbon\Carbon;
use Mail;
class TestController extends Controller
{
    public function index()
    {
        $questions = WritingTestQuestion::all();
        return view('backend.modules.test.writing_test_question_index',compact('questions'));
    }
    public function create()
    {
        $courses = Course::all();
        $sessions = Session::all();
        return view('backend.modules.test.writing_test_question_create',compact('courses','sessions'));
    }
    public function save(Request $request)
    {
        if($request['type'] == 1)
        {
            $question = new WritingTestQuestion();
            $question->course_id = $request['course'];
            $question->type = $request['type'];
            $question->task = $request['task_type_1'];
            $question->session_id = $request['session'];
            $question->session = "W".$request['session'];
            $question->question = $request['question'];
            $question->save();
        }
        else
        {
            $question = new WritingTestQuestion();
            $question->course_id = $request['course'];
            $question->type = $request['type'];
            $question->task = 1;
            $question->session_id = $request['session'];
            $question->session = "W".$request['session'];
            $question->question = $request['question'];
            $question->save();
            $question = new WritingTestQuestion();
            $question->course_id = $request['course'];
            $question->type = $request['type'];
            $question->task = 2;
            $question->session_id = $request['session'];
            $question->session = "W".$request['session'];
            $question->question = $request['question'];
            $question->save();
        }
       

        return redirect()->back()->with(['saved_success' => 1]);
    }
    public function edit($id)
    {
        $question = WritingTestQuestion::findOrFail($id);
        $courses = Course::all();
        $sessions = Session::all();
        return view('backend.modules.test.writing_test_question_edit',compact('courses','sessions','question'));
    }
    public function update(Request $request)
    {
        $question = WritingTestQuestion::findOrFail($request['question_id']);
        $question->course_id = $request['course'];
        $question->type = $request['type'];
        $question->task = $request['task'];
        $question->session = "W".$request['session'];
        $question->question = $request['question'];
        $question->save();

        return redirect()->back()->with(['updated_success' => 1]);
    }
    public function student_book_speaking_test_page($id,$course_id)
    {
        $test = StudentSpeakingTest::where('student_id',$id)->where('course_id',$course_id)->first();
        if($test)
        {
            $tests = $test->speaking_tests + 1;
        }
        else
        {
          $tests = 1;  
          $new_test = new StudentSpeakingTest();
          $new_test->student_id = $id;
          $new_test->course_id = $course_id;
          $new_test->speaking_tests = 0;
          $new_test->save();
        }
        
        $student = Student::findOrFail($id);
        $course = Course::findOrFail($course_id);
        $channels = ZoomChannel::where('status',1)->get();
        return view('backend.modules.test.speaking_test_channels',compact('student','course','channels','tests'));
    }
    public function get_day_durations_ajax(Request $request)
    {
        $day = ZoomChannelDay::findOrFail($request->day_id);
        return view('backend.modules.test.day_durations',compact('day'));
    }
    public function book_speaking_test_duration(Request $request)
    {
        $duration = ZoomDayDuration::findOrFail($request['duration_id']);
        $duration->is_booked = 1;
        $duration->student_id = $request['student_id'];
        $duration->save();
        $tests = StudentSpeakingTest::where('student_id',$request['student_id'])->where('course_id',$request['course_id'])->first();
        $tests->speaking_tests++;
        $tests->save(); 
       
        return redirect()->back()->with(['booking_success' => 1]);
    }
    public function writing_test_checked(Request $request)
    {
        //dd($request);
        Validator::make($request->all(),[
            'student_id' => 'required',
            'task_response' => 'required',
            'cohesion_coherence' => 'required',
            'grammatical_range_and_accuracy' => 'required',
            'lexical_resource' => 'required',
            'total_score' => 'required',
            ])->validate();
        $student = Student::where('id',$request['student_id'])->first();
        $question = WritingTestQuestion::findOrFail($request['question_id']);
        $we = new WritingEvaluation();
        $we->student_id = $student->id;
        $we->tutor_name = Auth::user()->name;
        $we->session = $question->session;
        $we->task = $question->task;
        $we->type = $question->type;
        $we->test_type = $request['test_type'];
        $we->task_response = $request['task_response'];
        $we->cohesion_coherence = $request['cohesion_coherence'];
        $we->grammatical_range_and_accuracy = $request['grammatical_range_and_accuracy'];
        $we->lexical_resource = $request['lexical_resource'];
        $we->total_score = $request['total_score'];
        $we->spent_time = $request['spent_timer'];
        if($request['test_type'] == 1)
        {
            $pdf = PDF::loadView('backend.pdfs.answer_pdf', [
                'test_type' => $request['test_type'],
                'answer' => $request['answer'],
                'feedback' => $request['feedback'],
            ]);
            $filename = $student->id . rand(10,10000) . '.pdf';
            $pdf->save('answers_pdfs/'.$filename);
            $we->answer_sheet = $filename;
        }
        else
        {
            //dd($request->hasFile('answer_sheet'));
            if ($request->hasFile('answer_sheet')) 
            {
                
                $image_folder = public_path('answers');

                $fileNameWithExt = $request->file('answer_sheet')->getClientOriginalName();
                //Get just file name
                $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);
                //Get just extention
                $extention = $request->file('answer_sheet')->getClientOriginalExtension();
                //Filename to store
                $ImageNameToStore = $fileName . $student->id . '.' . $extention;
                //Upload File
                $request->file('answer_sheet')->move($image_folder, $ImageNameToStore);
                $we->answer_sheet_image = $fileName . $student->id . '.' . $extention;
            }
            $pdf = PDF::loadView('backend.pdfs.answer_pdf', [
                'test_type' => $request['test_type'],
                'answer' => $we->answer_sheet_image,
                'feedback' => $request['feedback'],
            ]);
            $filename = $student->id . rand(10,10000) . '.pdf';
            $pdf->save('answers_pdfs/'.$filename);
            $we->answer_sheet = $filename;
        }
        if ($request->hasFile('audio_file')) {
            $image_folder = public_path('audio');
              
            //Apartment Video
            $fileNameWithExt = $request->file('audio_file')->getClientOriginalName();
            //Get just file name
            $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extention
            $extention = $request->file('audio_file')->getClientOriginalExtension();
            //Filename to store
            $ImageNameToStore = $fileName . $student->id . '.' . $extention;
            //Upload File
            $request->file('audio_file')->move($image_folder, $ImageNameToStore);
            $we->audio_file = $fileName . $student->id . '.' . $extention;
        }
        
        $we->save();
            //  $e = WritingEvaluation::findOrFail(2);
         Mail::send('backend.emails.writing_evaluation_data', ['e' => $we,'type' => 'Writing'], function ($message) use ($we)
            {
                $message->from(config('app.from'), config('app.mail_from_name'));
                $message->subject("Writing Evaluation For ". $we->student->first_name . " " . $we->student->last_name);
                $message->to(config('app.to_writing'));
            });
        return redirect()->back()->with(['saved_success' => 1]);
    }
}
