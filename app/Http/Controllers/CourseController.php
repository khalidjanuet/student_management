<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Session;
use App\CourseSession;
use App\WritingTestQuestion;
class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status',1)->get();
        return view('backend.modules.course.index',compact('courses'));
    }
    public function create()
    {
        $sessions = Session::all();
        return view('backend.modules.course.create',compact('sessions'));
    }
    public function save(Request $request)
    {
        $course = new Course();
        $course->name = $request['name'];
        $course->duration = $request['duration'];
        $course->fee = $request['fee'];
        $course->listening_tests = $request['listening_tests'];
        $course->reading_tests = $request['reading_tests'];
        $course->writing_tests = $request['writing_tests'];
        $course->writing_tests_2 = $request['writing_tests_2'];
        $course->speaking_tests = $request['speaking_tests']; 
        $course->interactive_sessions = $request['interactive_sessions'];
        $course->mock_tests = $request['mock_tests'];
        $course->save();
       
       
        foreach($request['sessions'] as $session)
        {
            $s = new CourseSession();
            $s->course_id = $course->id;
            $s->session_id = $session;
            $s->save();
        }
       
        //dd('1');
        return redirect()->back()->with(['success' => 1]);
    }
    public function view($id)
    {
        $course = Course::findOrFail($id);
        $sessions = Session::all();
        return view('backend.modules.course.view',compact(
            'course','sessions'
        ));
    }
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $sessions = Session::all();
       
        return view('backend.modules.course.edit',compact(
            'course','sessions'
        ));
    }
    public function update(Request $request)
    {
        //dd($request);
        $course = Course::findOrFail($request['course_id']);
        $course->name = $request['name'];
        $course->duration = $request['duration'];
        $course->fee = $request['fee'];
        $course->listening_tests = $request['listening_tests'];
        $course->reading_tests = $request['reading_tests'];
        $course->writing_tests = $request['writing_tests'];
        $course->writing_tests_2 = $request['writing_tests_2'];
        $course->speaking_tests = $request['speaking_tests']; 
        $course->interactive_sessions = $request['interactive_sessions'];
        $course->mock_tests = $request['mock_tests'];
        $course->save();
       
        foreach($request['sessions'] as $session)
        {
            $is_present = 0;
            foreach($course->sessions as $se)
            {
                if($session == $se->session_id)
                {
                    $is_present = 1;
                }

            }
            if($is_present != 1)
            {
                $s = new CourseSession();
                $s->course_id = $course->id;
                $s->session_id = $session;
                $s->save();
            }
            
           
        }
       // dd($course->sessions);
        foreach($course->sessions as $se)
        {
            $is_not_present = 0;
            foreach($request['sessions'] as $session)
            {
                if($session == $se->session_id)
                {
                    $is_not_present = 1;
                }

            }
            if($is_not_present == 0)
            {
               $se->delete();
            }
            
           
        }
        return redirect()->back()->with(['success' => 1]);
    }
    public function delete($id)
    {
        $course = Course::findOrFail($id);
        $course->status = 0;
        $course->save();
        return redirect()->back()->with(['delete_success' => 1]);
    }
    public function course_session_details_ajax(Request $request)
    {
        $course = Course::findOrFail($request->course_id);
        $data = "";
        if($request->type == 1)
        {
            if($request->task == 1)
            for($i = 1; $i <= $course->writing_tests;$i++)
            {
                $done = WritingTestQuestion::where('course_id',$course->id)->where('session','W'.$i)->where('task',1)->where('type',1)->first();
                if(!$done)
                $data .= "<option value='".$i."' >".$i."</option>";
               
            }
            elseif($request->task == 2)
            for($i = 1; $i <= $course->writing_tests_2;$i++)
            {
                $done = WritingTestQuestion::where('course_id',$course->id)->where('session','W'.$i)->where('task',2)->where('type',1)->first();
                if(!$done)
                $data .= "<option value='".$i."' >".$i."</option>";
            }
        }
        else
        {
            if($request->task == 1)
            for($i = 1; $i <= $course->writing_tests;$i++)
            {
                $done = WritingTestQuestion::where('course_id',$course->id)->where('session','W'.$i)->where('task',1)->where('type',2)->first();
                if(!$done)
                $data .= "<option value='".$i."' >".$i."</option>";
               
            }
            elseif($request->task == 2)
            for($i = 1; $i <= $course->writing_tests_2;$i++)
            {
                $done = WritingTestQuestion::where('course_id',$course->id)->where('session','W'.$i)->where('task',2)->where('type',2)->first();
                if(!$done)
                $data .= "<option value='".$i."' >".$i."</option>";
            }
        }
       


        return $data;
    }
    public function course_session_details_for_mock_test_ajax(Request $request)
    {
        $course = Course::findOrFail($request->course_id);
        $data = "";
       
            if($course->writing_tests > 0)
            for($i = 1; $i <= $course->writing_tests;$i++)
            {
                $done = WritingTestQuestion::where('course_id',$course->id)->where('session','W'.$i)->where('task',1)->where('type',2)->first();
                if(!$done)
                $data .= "<option value='".$i."' >".$i."</option>";
               
            }
            
        return $data;
    }
    public function test_selection_course_sessions_ajax(Request $request)
    {
        $course = Course::findOrFail($request->course_id);
        $student_id = $request->student_id;
        $data = "";
        if($request->type == 1)
        {
            if($request->task == 1)
            for($i = 1; $i <= $course->writing_tests;$i++)
            {
                $done = WritingTestQuestion::where('course_id',$course->id)->where('session','W'.$i)->where('task',1)->where('type',1)->first();
                if(!$done)
                $data .= "<option value='".$i."' >".$i."</option>";
               
            }
            elseif($request->task == 2)
            for($i = 1; $i <= $course->writing_tests_2;$i++)
            {
                $done = WritingTestQuestion::where('course_id',$course->id)->where('session','W'.$i)->where('task',2)->where('type',1)->first();
                if(!$done)
                $data .= "<option value='".$i."' >".$i."</option>";
            }
        }
        else
        {
            if($request->task == 1)
            for($i = 1; $i <= $course->writing_tests;$i++)
            {
                $done = WritingTestQuestion::where('course_id',$course->id)->where('session','W'.$i)->where('task',1)->where('type',2)->first();
                if(!$done)
                $data .= "<option value='".$i."' >".$i."</option>";
               
            }
            elseif($request->task == 2)
            for($i = 1; $i <= $course->writing_tests_2;$i++)
            {
                $done = WritingTestQuestion::where('course_id',$course->id)->where('session','W'.$i)->where('task',2)->where('type',2)->first();
                if(!$done)
                $data .= "<option value='".$i."' >".$i."</option>";
            }
        }
       


        return $data;
    }
    public function course_get_question_only(Request $request)
    {
        $question = WritingTestQuestion::findOrFail($request->id);
        $data = $question->question;
        return $data;

    }
}
