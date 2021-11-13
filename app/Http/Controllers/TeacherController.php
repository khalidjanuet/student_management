<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\SpeakingEvaluation;
use App\ReadingEvaluation;
use App\ListeningEvaluation;
use App\WritingEvaluation;
use Validator;
use Mail;
class TeacherController extends Controller
{
    public function speaking_evaluation_form()
    {
        $students = Student::where('status',1)->where('delete_status',0)->get();
        return view('backend.modules.teacher.speaking_evaluation_form',compact('students'));
    }
    public function speaking_evaluation_save(Request $request)
    {
        
        Validator::make($request->all(),[
            'student_id' => 'required',
            'tutor_name' => 'required',
            'session' => 'required',
            'test_type' => 'required',
            'problems'=> 'required',
            'pronunciation' => 'required',
            'suggestions' => 'required',
            'fluency_cohesion' => 'required',
            'grammatical_range_and_accuracy' => 'required',
            'lexical_resource' => 'required',
            'total_score' => 'required',
            ])->validate();
        $student = Student::where('id',$request['student_id'])->first();
        $se = new SpeakingEvaluation();
        $se->student_id = $student->id;
        $se->tutor_name = $request['tutor_name'];
        $se->session = "S".$request['session'];
        $se->test_type = $request['test_type'];
        $se->problems = $request['problems'];
        $se->suggestions = $request['suggestions'];
        $se->fluency_cohesion = $request['fluency_cohesion'];
        $se->pronunciation = $request['pronunciation'];
        $se->grammatical_range_and_accuracy = $request['grammatical_range_and_accuracy'];
        $se->lexical_resource = $request['lexical_resource'];
        $se->total_score = $request['total_score'];
        $se->save();
         //  $e = SpeakingEvaluation::findOrFail(2);
         Mail::send('backend.emails.reading_evaluation_data', ['e' => $se,'type' => 'Speaking'], function ($message) use($se)
            {
                $message->from(config('app.from'), config('app.mail_from_name'));
                $message->subject("Speaking Evaluation For ". $se->student->first_name . " " . $se->student->last_name);
                $message->to(config('app.to_support'));
            });
        return redirect()->back()->with(['saved_success' => 1]);
    }
    public function reading_evaluation_form()
    {
        $students = Student::where('status',1)->where('delete_status',0)->get();
        return view('backend.modules.teacher.reading_evaluation_form',compact('students'));
    }
    public function reading_evaluation_save(Request $request)
    {
        
        Validator::make($request->all(),[
            'student_id' => 'required',
            'session' => 'required',
            'test_type' => 'required',
            'total_score' => 'required',
            ])->validate();
        $student = Student::where('id',$request['student_id'])->first();
        $re = new ReadingEvaluation();
        $re->student_id = $student->id;
        $re->tutor_name = $request['tutor_name'];
        $re->session = "R".$request['session'];
        $re->test_type = $request['test_type'];
        // $re->problems = $request['problems'];
        // $re->suggestions = $request['suggestions'];
        // $re->fluency_cohesion = $request['fluency_cohesion'];
        // $re->pronunciation = $request['pronunciation'];
        // $re->grammatical_range_and_accuracy = $request['grammatical_range_and_accuracy'];
        // $re->lexical_resource = $request['lexical_resource'];
        $re->total_score = $request['total_score'];
          if ($request->hasFile('answer_sheet')) {
            $image_folder = public_path('img/answer_sheets');
              
            //Apartment Video
            $fileNameWithExt = $request->file('answer_sheet')->getClientOriginalName();
            //Get just file name
            $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extention
            $extention = $request->file('answer_sheet')->getClientOriginalExtension();
            //Filename to store
            $ImageNameToStore = $fileName . $student->id . '_reading_.' . $extention;
            //Upload File
            $request->file('answer_sheet')->move($image_folder, $ImageNameToStore);
            $re->answer_sheet = $ImageNameToStore;
        }
        $re->save();
        
           //$e = ReadingEvaluation::findOrFail(2);
         Mail::send('backend.emails.reading_evaluation_data', ['e' => $re,'type' => 'Reading'], function ($message) use ($re)
            {
                $message->from(config('app.from'), config('app.mail_from_name'));
                $message->subject("Reading Evaluation For ". $re->student->first_name . " " . $re->student->last_name);
                $message->to(config('app.to_support'));
            });
        return redirect()->back()->with(['saved_success' => 1]);
    }
    public function listening_evaluation_form()
    {
        $students = Student::where('status',1)->where('delete_status',0)->get();
        return view('backend.modules.teacher.listening_evaluation_form',compact('students'));
    }
    public function listening_evaluation_save(Request $request)
    {
        Validator::make($request->all(),[
            'student_id' => 'required',
            'session' => 'required',
            'test_type' => 'required',
            'total_score' => 'required',
            ])->validate();
        $student = Student::where('id',$request['student_id'])->first();
        $le = new ListeningEvaluation();
        $le->student_id = $student->id;
        $le->tutor_name = $request['tutor_name'];
        $le->session = "L".$request['session'];
        $le->test_type = $request['test_type'];
        // $le->problems = $request['problems'];
        // $le->suggestions = $request['suggestions'];
        // $le->fluency_cohesion = $request['fluency_cohesion'];
        // $le->pronunciation = $request['pronunciation'];
        // $le->grammatical_range_and_accuracy = $request['grammatical_range_and_accuracy'];
        // $le->lexical_resource = $request['lexical_resource'];
        $le->total_score = $request['total_score'];
          if ($request->hasFile('answer_sheet')) {
            $image_folder = public_path('img/answer_sheets');
              
            //Apartment Video
            $fileNameWithExt = $request->file('answer_sheet')->getClientOriginalName();
            //Get just file name
            $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extention
            $extention = $request->file('answer_sheet')->getClientOriginalExtension();
            //Filename to store
            $ImageNameToStore = $fileName . $student->id . '_listening_.' . $extention;
            //Upload File
            $request->file('answer_sheet')->move($image_folder, $ImageNameToStore);
            $le->answer_sheet = $ImageNameToStore;
        }
        $le->save();
         //  $e = ListeningEvaluation::findOrFail(2);
         Mail::send('backend.emails.reading_evaluation_data', ['e' => $le,'type' => 'Listening'], function ($message) use($le)
            {
                $message->from(config('app.from'), config('app.mail_from_name'));
                $message->subject("Listening Evaluation For ". $le->student->first_name . " " . $le->student->last_name);
                $message->to(config('app.to_support'));
            });
        return redirect()->back()->with(['saved_success' => 1]);
    }
    public function writing_evaluation_form()
    {
        $students = Student::where('status',1)->where('delete_status',0)->get();
        return view('backend.modules.teacher.writing_evaluation_form',compact('students'));
    }
  
    public function writing_evaluation_save(Request $request)
    {
     //   dd($request);
        Validator::make($request->all(),[
            'student_id' => 'required',
            'tutor_name' => 'required',
            'session' => 'required',
            'task' => 'required',
            'test_type' => 'required',
            'feedback_1'=> 'required',
            'feedback_2' => 'required',
            'feedback_3' => 'required',
            'feedback_5' => 'required',
            'task_response' => 'required',
            'suggestions' => 'required',
            'cohesion_coherence' => 'required',
            'grammatical_range_and_accuracy' => 'required',
            'lexical_resource' => 'required',
            'total_score' => 'required',
            ])->validate();
        $student = Student::where('id',$request['student_id'])->first();
        $we = new WritingEvaluation();
        $we->student_id = $student->id;
        $we->tutor_name = $request['tutor_name'];
        $we->session = "W".$request['session'];
        $we->task = $request['task'];
        $we->test_type = $request['test_type'];
        $we->feedback_1 = $request['feedback_1'];
        $we->feedback_2 = $request['feedback_2'];
        $we->feedback_3 = $request['feedback_3'];
        $we->feedback_4 = $request['feedback_4'];
        $we->feedback_5 = $request['feedback_5'];
        $we->task_response = $request['task_response'];
        $we->suggestions = $request['suggestions'];
        $we->cohesion_coherence = $request['cohesion_coherence'];
        $we->grammatical_range_and_accuracy = $request['grammatical_range_and_accuracy'];
        $we->lexical_resource = $request['lexical_resource'];
        $we->total_score = $request['total_score'];
        if ($request->hasFile('answer_sheet')) {
            $image_folder = public_path('img/answer_sheets');
              
            //Apartment Video
            $fileNameWithExt = $request->file('answer_sheet')->getClientOriginalName();
            //Get just file name
            $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extention
            $extention = $request->file('answer_sheet')->getClientOriginalExtension();
            //Filename to store
            $ImageNameToStore = $fileName . $student->id . '.' . $extention;
            //Upload File
            $request->file('answer_sheet')->move($image_folder, $ImageNameToStore);
            $we->answer_sheet =  $ImageNameToStore;
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
