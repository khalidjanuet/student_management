<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Student;
use App\StudentAttendance;
use App\StudentAttendanceFeedback;
use App\StudentTestSuggestion;
use App\ListeningEvaluation;
use App\ReadingEvaluation;
use App\WritingEvaluation;
use App\SpeakingEvaluation;
use App\StudentFee;
use App\StudentFeeDetail;
use App\Course;
use App\StudentClass;
use App\StudentCourse;
use App\StudentSection;
use App\Session;
use App\User;
use Validator;
use Mail;
use App\Topic;
use App\WritingTestQuestion;
use App\WritingTest;
use PDF;
use Storage;
use Carbon\Carbon;
use Zoom;
class StudentController extends Controller
{
    public function index()
    {
        // $students = Student::all();
        // foreach($students as $student)
        // {
        //     $sc = new StudentCourse();
        //     $sc->student_id = $student->id;
        //     $sc->course_id = $student->course_id;
        //     $sc->status = 1;
        //     $sc->save();
        // }
        //    $user = Zoom::user();
        //    $user = Zoom::user()->create([
        //     'first_name' => 'Developer',
        //     'last_name' => 'User',
        //     'email' => 'khalidjanuet1@gmail.com',
        //     'password' => 'pass1234'
        // ]);
        

        // $user = Zoom::user()->find('khalidjanuet@gmail.com');
        // $meetings = $user->meetings()->get();
        // foreach($meetings as $meeting)
        // {
        //     dd($meeting->join_url);
        // }
        
        // $user = Zoom::user()->find('khalidjanuet1@gmail.com');
        // $meeting = Zoom::meeting()->make([
        //     'topic' => 'New Testing Meeting 1',
        //     'type' => 2,
        //     'start_time' => new Carbon('2021-10-26 09:30:00'), // best to use a Carbon instance here.
        //     'duration' => 20,
        //   ]);
        
      
       
        //   $user->meetings()->save($meeting);
        //   //$user = Zoom::user()->find('khalidjanuet@gmail.com')->meetings()->save($meeting);
        // $meetings = Zoom::user()->find('khalidjanuet1@gmail.com')->meetings;
        // dd($meetings);
      
         
        
        
        //dd($user);
        $students = Student::where('status',1)->where('delete_status',0)->paginate(100);
        return view('backend.modules.student.index',compact('students'));
    }
    public function create()
    {
        $courses = Course::where('status',1)->get();
        $classes = StudentClass::all();
        $sections = StudentSection::all();
        return view('backend.modules.student.create',compact('courses','classes','sections'));
    }
    public function save(Request $request)
    {
        Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'whatsapp' => 'required',
            'email' => 'required',
            'attempt'=> 'required',
            'street_1' => 'required',
            'city' => 'required',
            'region' => 'required',
            'zipcode' => 'required',
            'profile_image' => 'required|max:3000',
            ])->validate();
        
        $student = new Student();
        if ($request->hasFile('profile_image')) {
            $image_folder = public_path('img/student');
              
            //Apartment Video
            $fileNameWithExt = $request->file('profile_image')->getClientOriginalName();
            //Get just file name
            $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extention
            $extention = $request->file('profile_image')->getClientOriginalExtension();
            //Filename to store
            $ImageNameToStore = $fileName . $student->id . '.' . $extention;
            //Upload File
            $request->file('profile_image')->move($image_folder, $ImageNameToStore);
        }
        $student->profile_image = $fileName . $student->id . '.' . $extention;
        $student->first_name = $request['first_name'];
        $student->last_name = $request['last_name'];
        $student->location = $request['location'];   
        $student->phone = $request['phone'];
        $student->whatsapp = $request['whatsapp'];
        $student->email = $request['email'];
        $student->module = $request['module'];
        //$student->course_id = $request['course_id'];
        $student->attempt = $request['attempt'];
        $student->previous_score = $request['previous_score'];
        $student->overall_target_score = $request['overall_target_score'];
        $student->listening_target_score = $request['listening_target_score'];
        $student->reading_target_score = $request['reading_target_score'];
        $student->writing_target_score = $request['writing_target_score'];
        $student->speaking_target_score = $request['speaking_target_score'];
        $student->problems = $request['problems'];
        $student->street_1 = $request['street_1'];
        $student->street_2 = $request['street_2'];
        $student->city = $request['city'];
        $student->region = $request['region'];
        $student->zipcode = $request['zipcode'];
        $student->country = $request['country'];
        $student->session_day_time = $request['session_day_time'];
        $student->admission_date = $request['admission_date'];
        $student->status = 1;
        $student->save();

        // $student_course = new StudentCourse();
        // $student_course->student_id = $student->id;
        // $student_course->course_id = $request['course_id'];
        // $student_course->status = 1;
        // $student_course->save();
        
         Mail::send('backend.emails.student_registration', ['student' => $student], function ($message)
            {
                $message->from(config('app.from'), config('app.mail_from_name'));
                $message->subject("Student Registration");
                $message->to(config('app.to_support'));
                //$message->to("khalidjanuet@gmail.com");
            });
        

        return redirect()->back()->with(['saved_success' => 1]);

    }
    public function show_page_to_select_course_for_details($id)
    {
        $student = Student::findOrFail($id);
        
        if($student->courses->count() == 0)
        {
            $courses = Course::all();
            return view('backend.modules.student.student_without_course',compact('student','courses'));
        }
        else if($student->courses->count() == 1)
        {
            $course_id = StudentCourse::where('student_id',$student->id)->pluck('course_id')->first();
            return $this->detail($student->id,$course_id); 
        }
        else
        {
            return view('backend.modules.student.pre_details',compact('student'));
        }
       
    }
    public function detail($id,$course_id)
    {
        // $pdf = PDF::loadView('backend.pdfs.answer_pdf', [
        //     'question' => 'Question text',
        //     'answer' => 'Answer Text',
        // ]);
        // $pdf->save('answers_pdfs/question.pdf');

       //Storage::put('public/answers_pdfs/invoice.pdf', $pdf->output());
       
       //return $pdf->download('invoice.pdf');

        $topics = Topic::where('status',1)->orderBy('created_at','DESC')->get();
        $student = Student::findOrFail($id);
        $student_course = StudentCourse::where('student_id',$id)->where('course_id',$course_id)->first();
        $fee = StudentFee::where('student_id',$id)->where('verified',1)->first();
        $attendance = StudentAttendance::where('student_id',$id)->count();
        $attendances = StudentAttendance::where('student_id',$id)->orderBy('created_at','desc')->get();
        $att_feedbacks = StudentAttendanceFeedback::where('student_id',$id)->get();
        $sessions = Session::all();
        
        $evaluations[0] = ListeningEvaluation::where('student_id',$id)->where('test_type',1)->orderBy('session','ASC')->get();
        $evaluations[1] = SpeakingEvaluation::where('student_id',$id)->where('test_type',1)->orderBy('session','ASC')->get();
        $evaluations[2] = WritingEvaluation::where('student_id',$id)->where('test_type',1)->where('task',1)->orderBy('session','ASC')->get();
        $evaluations[3] = ReadingEvaluation::where('student_id',$id)->where('test_type',1)->orderBy('session','ASC')->get();
        $evaluations[4] = WritingEvaluation::where('student_id',$id)->where('test_type',1)->where('task',2)->orderBy('session','ASC')->get();
       
        $m_evaluations[0] = ListeningEvaluation::where('student_id',$id)->where('test_type',2)->orderBy('session','ASC')->get();
        $m_evaluations[1] = SpeakingEvaluation::where('student_id',$id)->where('test_type',2)->orderBy('session','ASC')->get();
        $m_evaluations[2] = WritingEvaluation::where('student_id',$id)->where('test_type',2)->where('task',1)->orderBy('session','ASC')->get();
        $m_evaluations[3] = ReadingEvaluation::where('student_id',$id)->where('test_type',2)->orderBy('session','ASC')->get();
        $m_evaluations[4] = WritingEvaluation::where('student_id',$id)->where('test_type',2)->where('task',2)->orderBy('session','ASC')->get();
       
        $suggestions[0] = StudentTestSuggestion::where('student_id',$id)->where('test_type',1)->orderBy('created_at','DESC')->get();
        $suggestions[1] = StudentTestSuggestion::where('student_id',$id)->where('test_type',2)->orderBy('created_at','DESC')->get();
        return view('backend.modules.student.details',compact('topics','student','sessions','student_course','fee','attendances','attendance','att_feedbacks','evaluations','m_evaluations','suggestions'));
    }
    public function report_card_detail($id,$course_id)
    {
        // $pdf = PDF::loadView('backend.pdfs.answer_pdf', [
        //     'question' => 'Question text',
        //     'answer' => 'Answer Text',
        // ]);
        // $pdf->save('answers_pdfs/question.pdf');

       //Storage::put('public/answers_pdfs/invoice.pdf', $pdf->output());
       
       //return $pdf->download('invoice.pdf');

        $topics = Topic::where('status',1)->orderBy('created_at','DESC')->get();
        $student = Student::findOrFail($id);
        $student_course = StudentCourse::where('student_id',$id)->where('course_id',$course_id)->first();
        $fee = StudentFee::where('student_id',$id)->where('verified',1)->first();
        $attendance = StudentAttendance::where('student_id',$id)->count();
        $attendances = StudentAttendance::where('student_id',$id)->orderBy('created_at','desc')->get();
        $att_feedbacks = StudentAttendanceFeedback::where('student_id',$id)->get();
        $sessions = Session::all();
        
        $evaluations[0] = ListeningEvaluation::where('student_id',$id)->where('test_type',1)->orderBy('session','ASC')->get();
        $evaluations[1] = SpeakingEvaluation::where('student_id',$id)->where('test_type',1)->orderBy('session','ASC')->get();
        $evaluations[2] = WritingEvaluation::where('student_id',$id)->where('test_type',1)->where('task',1)->orderBy('session','ASC')->get();
        $evaluations[3] = ReadingEvaluation::where('student_id',$id)->where('test_type',1)->orderBy('session','ASC')->get();
        $evaluations[4] = WritingEvaluation::where('student_id',$id)->where('test_type',1)->where('task',2)->orderBy('session','ASC')->get();
       
        $m_evaluations[0] = ListeningEvaluation::where('student_id',$id)->where('test_type',2)->orderBy('session','ASC')->get();
        $m_evaluations[1] = SpeakingEvaluation::where('student_id',$id)->where('test_type',2)->orderBy('session','ASC')->get();
        $m_evaluations[2] = WritingEvaluation::where('student_id',$id)->where('test_type',2)->where('task',1)->orderBy('session','ASC')->get();
        $m_evaluations[3] = ReadingEvaluation::where('student_id',$id)->where('test_type',2)->orderBy('session','ASC')->get();
        $m_evaluations[4] = WritingEvaluation::where('student_id',$id)->where('test_type',2)->where('task',2)->orderBy('session','ASC')->get();
       
        $suggestions[0] = StudentTestSuggestion::where('student_id',$id)->where('test_type',1)->orderBy('created_at','DESC')->get();
        $suggestions[1] = StudentTestSuggestion::where('student_id',$id)->where('test_type',2)->orderBy('created_at','DESC')->get();
        return view('backend.modules.student.report_card',compact('topics','student','sessions','student_course','fee','attendances','attendance','att_feedbacks','evaluations','m_evaluations','suggestions'));
    }
   
    public function report_card($id,$course_id)
    {
        $student = Student::findOrFail($id);
       
        return $this->report_card_detail($student->id,$course_id); 
       // return view('backend.modules.student.report_card',compact('student','fee','attendances','attendance','att_feedbacks','evaluations','m_evaluations','suggestions'));
    
    }
    public function test_details(Request $request)
    {
        
        if($request->type == 1)
        {
            $result = ListeningEvaluation::findOrFail($request->test_id);
        }
        if($request->type == 2)
        {
            $result = ReadingEvaluation::findOrFail($request->test_id);
        }
        if($request->type == 3)
        {
            $result = WritingEvaluation::findOrFail($request->test_id);
        }
        if($request->type == 4)
        {
            $result = SpeakingEvaluation::findOrFail($request->test_id);
        }
        $type = $request->type;
        return view('backend.modules.student.test_details',compact('type','result'));
    }
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $courses = Course::all();
        $classes = StudentClass::all();
        $sections = StudentSection::all();
        return view('backend.modules.student.edit',compact('student','courses','classes','sections'));
    }
    public function update(Request $request)
    {
        Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'attempt'=> 'required',
            'street_1' => 'required',
            'city' => 'required',
            'region' => 'required',
            'zipcode' => 'required',
            'profile_image' => 'max:3000',
            ])->validate();
        
        $student = Student::findOrFail($request['id']);
        if ($request->hasFile('profile_image')) {
            $image_folder = public_path('img/student');
              
            //Apartment Video
            $fileNameWithExt = $request->file('profile_image')->getClientOriginalName();
            //Get just file name
            $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extention
            $extention = $request->file('profile_image')->getClientOriginalExtension();
            //Filename to store
            $ImageNameToStore = $fileName . $student->id . '.' . $extention;
            //Upload File
            $request->file('profile_image')->move($image_folder, $ImageNameToStore);
            $student->profile_image = $fileName . $student->id . '.' . $extention;
        }
        
        $student->first_name = $request['first_name'];
        $student->last_name = $request['last_name'];
        $student->location = $request['location'];   
        $student->phone = $request['phone'];
        $student->whatsapp = $request['whatsapp'];
        $student->email = $request['email'];
        $student->module = $request['module'];
       // $student->course_id = $request['course_id'];
        $student->attempt = $request['attempt'];
        $student->previous_score = $request['previous_score'];
        $student->overall_target_score = $request['overall_target_score'];
        $student->listening_target_score = $request['listening_target_score'];
        $student->reading_target_score = $request['reading_target_score'];
        $student->writing_target_score = $request['writing_target_score'];
        $student->speaking_target_score = $request['speaking_target_score'];
        $student->problems = $request['problems'];
        $student->street_1 = $request['street_1'];
        $student->street_2 = $request['street_2'];
        $student->city = $request['city'];
        $student->region = $request['region'];
        $student->zipcode = $request['zipcode'];
        $student->country = $request['country'];
        $student->session_day_time = $request['session_day_time'];
        $student->admission_date = $request['admission_date'];
        $student->status = 1;
        $student->save();
        //dd($student->course_id);
        $fee = StudentFee::where('student_id',$student->id)->where('status',0)->first();
        if($fee)
        { 
            $fee->course_id = $student->course_id;
            $fee->total = $student->course->fee;
            $fee->net_total = $fee->total - $fee->discount;
            if($fee->net_total > $fee->paid)
            {
                $fee->status = 0;
                $fee->remaining = $fee->net_total - $fee->paid;
            }
            elseif($fee->net_total == $fee->paid)
            {
                $fee->status = 1;
            }
            elseif($fee->net_total < $fee->paid)
            {
                $fee->status = 1;
                $fee->remaining =$fee->net_total - $fee->paid;
            }
            $fee->save();
            Mail::send('backend.emails.fee_data', ['fee' => $fee], function ($message)
            {
                $message->from(config('app.from'), config('app.mail_from_name'));
                $message->subject("Student Course Change Updated Fee Record");
                $message->to(config('app.to_support'));
            });


        }
       

        return redirect()->back()->with(['update_success' => 1]);

    }
    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $student->delete_status = 1;
        $student->save();

        return redirect()->back()->with(['delete_success' => 1]);
    }
    public function fee_index()
    {
        $fees = StudentFee::where('verified',1)->get();
        return view('backend.modules.student.fee_index',compact('fees'));
    }
    public function fee_form()
    {
        $students = Student::where('status',1)->where('delete_status',0)->get();
        $courses = Course::where('status',1)->get();
        $business_leaders = User::where('role',4)->where('status',1)->get();
        return view('backend.modules.student.fee_form',compact('students','courses','business_leaders'));
    }
    public function student_fee_business_administrators_list_ajax(Request $request)
    {
        $business_administrators = User::where('is_business_administrator',1)->where('business_lead_id',$request->business_leader_id)->get();
        return view('backend.modules.student.business_administrators',compact('business_administrators'));
    }
    public function fee_due_date_change(Request $request)
    {
        $fee = StudentFee::findOrFail($request['fee_id']);
        $fee->due_date = $request['new_due_date'];
        $fee->save();
        return redirect()->back()->with(['due_date_update_success' => 1]);
    
    }
    public function filter_fee(Request $request)
    {
        $fees = StudentFee::where('due_date','>=',$request['from_date'])->where('due_date','<=',$request['to_date'])->get();
        return view('backend.modules.student.fee_index',compact('fees'));
    }
    public function student_details_ajax(Request $request)
    {
        $student = Student::where('id',$request->student_id)->first();
        if($student)
        {
            $fee = StudentFee::where('student_id',$request->student_id)->where('status',0)->first();
            if($fee)
            {
                $data = array(
                    'exists' => 1,
                    'total' =>$fee->total,
                    'discount' => $fee->discount,
                    'net_total' => $fee->net_total,
                    'paid' => $fee->paid,
                    'remaining' => $fee->remaining,
                    'course_id' =>$student->course_id,
                    'course_name' => $student->course->name,
                    'location' => $student->location,
                );
                
            }
            else
            {
                $data = array(
                    'exists' => 0,
                    'course_id' =>$student->course_id,
                    'course_name' => $student->course->name,
                    'total' => $student->course->fee,
                    'location' => $student->location,
                );
                
            }
            return $data;
           
            
        }

    }
    public function fee_details_ajax(Request $request)
    {
        $fee = StudentFee::where('student_id',$request->student_id)->where('status',0)->first();
        if($fee)
        {
            $data = array(
                'exists' => 1,
                'total' =>$fee->total,
                'discount' => $fee->discount,
                'net_total' => $fee->net_total,
                'paid' => $fee->paid,
                'remaining' => $fee->remaining
            );
            return $data;
        }
    }
    public function fee_save(Request $request)
    {
        //dd($request);
        //$fee_exists = StudentFee::where('student_id',$request['student_id'])->where('course_id',$request['course_id'])->where('status',0)->first();
        if($request['reason'] == "Balance Fee" || $request['reason'] == "Extension Fee")
        {
            $fee = StudentFee::where('student_id',$request['student_id'])->where('course_id',$request['course_id'])->where('status',0)->first();
           // $fee->paid = $request['paid'];
            $fee->remaining = $request['remaining'];
            $fee->paid_now = $request['paid_now'];
            $fee->location = $request['location'];
            $fee->reason = $request['reason'];
            $fee->paid = $request['paid'] + $request['paid_now'];
            $fee->due_date = $request['due_date'];
            $fee->admission_officer_name = $request['admission_officer_name'];
            $fee->business_lead_id = $request['business_leader_id'];
            $fee->business_admin_id =$request['business_administrator_id'];
            if($request['payment_method_1'] == "on")
            $fee->payment_method = "Website Link";
            else if($request['payment_method_2'] == "on")
            $fee->payment_method = "G Pay";
            else if($request['payment_method_3'] == "on")
            $fee->payment_method = "Phone Pay";
            else if($request['payment_method_4'] == "on")
            $fee->payment_method = "Paytm";
            else if($request['payment_method_5'] == "on")
            $fee->payment_method = "Net Banking";
            else if($request['payment_method_6'] == "on")
            $fee->payment_method = "Fed";
            else if($request['payment_method_7'] == "on")
            $fee->payment_method = "Cash";
            else if($request['payment_method_8'] == "on")
            $fee->payment_method = "Other";
            $fee->outside = $request['outside'];
            $fee->message = $request['message'];
            $fee->email = $request['email'];
           
        
            if ($request->hasFile('receipt')) {
                $image_folder = public_path('receipts');
                
                //Apartment Video
                $fileNameWithExt = $request->file('receipt')->getClientOriginalName();
                //Get just file name
                $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);
                //Get just extention
                $extention = $request->file('receipt')->getClientOriginalExtension();
                //Filename to store
                $ImageNameToStore = $fileName . $request['student_id'] . '.' . $extention;
                //Upload File
                $request->file('receipt')->move($image_folder, $ImageNameToStore);
                $fee->receipt = $fileName . $request['student_id'] . '.' . $extention;
            }
            if($fee->remaining > 0)
            {
                $fee->status = 0;
            }
            else
            {
                $fee->status = 1;
            }
            $fee->save();
        }
        elseif($request['reason'] == "New Course Fee")
        {
            $fee = new StudentFee();
            $fee->student_id = $request['student_id'];
            $fee->course_id = $request['course_id'];
            $fee->total = $request['total'];
            $fee->discount = $request['discount'];
            $fee->net_total = $request['net_total'];
            $fee->paid = $request['paid'] +$request['paid_now'];
            $fee->remaining = $request['remaining'];
            $fee->paid_now = $request['paid_now'];
            $fee->location = $request['location'];
            $fee->reason = $request['reason'];
            $fee->due_date = $request['due_date'];
            $fee->admission_officer_name = $request['admission_officer_name'];
            $fee->business_lead_id = $request['business_leader_id'];
            $fee->business_admin_id =$request['business_administrator_id'];
            if($request['payment_method_1'] == "on")
            $fee->payment_method = "Website Link";
            else if($request['payment_method_2'] == "on")
            $fee->payment_method = "G Pay";
            else if($request['payment_method_3'] == "on")
            $fee->payment_method = "Phone Pay";
            else if($request['payment_method_4'] == "on")
            $fee->payment_method = "Paytm";
            else if($request['payment_method_5'] == "on")
            $fee->payment_method = "Net Banking";
            else if($request['payment_method_6'] == "on")
            $fee->payment_method = "Fed";
            else if($request['payment_method_7'] == "on")
            $fee->payment_method = "Cash";
            else if($request['payment_method_8'] == "on")
            $fee->payment_method = "Other";
            $fee->outside = $request['outside'];
            $fee->message = $request['message'];
            $fee->email = $request['email'];
            if ($request->hasFile('receipt')) {
                $image_folder = public_path('receipts');
                
                //Apartment Video
                $fileNameWithExt = $request->file('receipt')->getClientOriginalName();
                //Get just file name
                $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);
                //Get just extention
                $extention = $request->file('receipt')->getClientOriginalExtension();
                //Filename to store
                $ImageNameToStore = $fileName . $request['student_id'] . '.' . $extention;
                //Upload File
                $request->file('receipt')->move($image_folder, $ImageNameToStore);
                $fee->receipt = $fileName . $request['student_id'] . '.' . $extention;
            }
            if($fee->remaining > 0)
            {
                $fee->status = 0;
            }
            else
            {
                $fee->status = 1;
            }
            $fee->save();
            

        }
        if($fee)
        {
               Mail::send('backend.emails.fee_data', ['fee' => $fee,'paid_amount_now' => $request['paid_now']], function ($message) use($fee)
            {
                $message->from(config('app.from'), config('app.mail_from_name'));
                $message->subject("Fee Record For ". $fee->student->first_name . " " . $fee->student->last_name);
                $message->to(config('app.to_accounts'));
                // $message->to('khalidjanuet@gmail.com ');
            });
        }
          // $fee = StudentFee::findOrFail(14);
      
        return redirect()->back()->with(['success' => 1]);
    }
    public function verify_fee($id)
    {
        $fee = StudentFee::findOrFail(decrypt($id));
        $fee->verified = 1;
        $fee->save();
         if($fee)
        {
               Mail::send('backend.emails.verified_fee_record', ['fee' => $fee,'paid_amount_now' => $fee->paid_now], function ($message) use($fee)
            {
                $message->from(config('app.from'), config('app.mail_from_name'));
                $message->subject("Fee Record (Verified) For ". $fee->student->first_name . " " . $fee->student->last_name);
                $message->to(config('app.to_support'));
              //  $message->to('khalidjanuet@gmail.com');
            });
        }
        return redirect()->route('login')->with(['fee_saved_success' => 1]);
    }
    public function fee_detail($id)
    {
        $fee = StudentFee::findOrFail($id);
        return view('backend.modules.student.fee_detail',compact('fee'));
    }
    public function student_course_session_details_ajax(Request $request)
    {
        $student = Student::findOrFail($request->student_id);
        $data = "";
        if($request->test_type == 1)
        {
            if($request->type == 1)
            for($i = 1; $i <= $student->course->listening_tests;$i++)
            {
                $done = ListeningEvaluation::where('student_id',$student->id)->where('session','L'.$i)->where('test_type',1)->first();
                if(!$done)
                $data .= "<option value='".$i."' >".$i."</option>";
                
            }
            elseif($request->type == 2)
            for($i = 1; $i <= $student->course->reading_tests;$i++)
            {
                $done = ReadingEvaluation::where('student_id',$student->id)->where('session','R'.$i)->where('test_type',1)->first();
                if(!$done)
                $data .= "<option value='".$i."' >".$i."</option>";
            }
            elseif($request->type == 3)
            for($i = 1; $i <= $student->course->speaking_tests;$i++)
            {
                $done = SpeakingEvaluation::where('student_id',$student->id)->where('session','S'.$i)->where('test_type',1)->first();
                if(!$done)
                $data .= "<option value='".$i."' >".$i."</option>";
            }
            elseif($request->type == 4 && $request->task == 1)
            for($i = 1; $i <= $student->course->writing_tests;$i++)
            {
                $done = WritingEvaluation::where('student_id',$student->id)->where('session','W'.$i)->where('task',1)->where('test_type',1)->first();
                if(!$done)
                $data .= "<option value='".$i."' >".$i."</option>";
               
            }
            elseif($request->type == 4 && $request->task == 2)
            for($i = 1; $i <= $student->course->writing_tests_2;$i++)
            {
                $done = WritingEvaluation::where('student_id',$student->id)->where('session','W'.$i)->where('task',2)->where('test_type',1)->first();
                if(!$done)
                $data .= "<option value='".$i."' >".$i."</option>";
            }
        }
        else
        {
            if($request->type == 1)
            for($i = 1; $i <= $student->course->listening_tests;$i++)
            {
                $done = ListeningEvaluation::where('student_id',$student->id)->where('session','L'.$i)->where('test_type',2)->first();
                if(!$done)
                $data .= "<option value='".$i."' >".$i."</option>";
                
            }
            elseif($request->type == 2)
            for($i = 1; $i <= $student->course->reading_tests;$i++)
            {
                $done = ReadingEvaluation::where('student_id',$student->id)->where('session','R'.$i)->where('test_type',2)->first();
                if(!$done)
                $data .= "<option value='".$i."' >".$i."</option>";
            }
            elseif($request->type == 3)
            for($i = 1; $i <= $student->course->speaking_tests;$i++)
            {
                $done = SpeakingEvaluation::where('student_id',$student->id)->where('session','S'.$i)->where('test_type',2)->first();
                if(!$done)
                $data .= "<option value='".$i."' >".$i."</option>";
            }
            elseif($request->type == 4 && $request->task == 1)
            for($i = 1; $i <= $student->course->writing_tests;$i++)
            {
                $done = WritingEvaluation::where('student_id',$student->id)->where('session','W'.$i)->where('task',1)->where('test_type',2)->first();
                if(!$done)
                $data .= "<option value='".$i."' >".$i."</option>";
               
            }
            elseif($request->type == 4 && $request->task == 2)
            for($i = 1; $i <= $student->course->writing_tests_2;$i++)
            {
                $done = WritingEvaluation::where('student_id',$student->id)->where('session','W'.$i)->where('task',2)->where('test_type',2)->first();
                if(!$done)
                $data .= "<option value='".$i."' >".$i."</option>";
            }
        }
       


        return $data;
    }
    public function student_course_session_details_for_pen_paper_ajax(Request $request)
    {
        $student = Student::findOrFail($request->student_id);
        $data = "<option value=''>Select Module Number</option>";
        if($request->test_type == 1)
        {
           if($request->task == 1)
            {

                $questions = WritingTestQuestion::where('course_id',$request->course_id)->where('task',1)->where('type',1)->get();
                if(count($questions) > 0)
                {
                    foreach($questions as $question)
                    {
                        $check = WritingTest::where('student_id',$student->id)->where('writing_test_question_id',$question->id)->first();
                        
                        if(!$check)
                        {
                            $data .= "<option value='".$question->session_id."' >".$question->session_id."</option>";
                        }
                       
                    }
                    
                }
            }
            elseif($request->task == 2)
            {
                $questions = WritingTestQuestion::where('course_id',$request->course_id)->where('task',2)->where('type',1)->get();
                if(count($questions) > 0)
                {
                    foreach($questions as $question)
                    {
                        $check = WritingTest::where('student_id',$student->id)->where('writing_test_question_id',$question->id)->first();
                        if(!$check)
                        $data .= "<option value='".$question->session_id."' >".$question->session_id."</option>";
                
                    }
                }
            }
        }
        else
        {
            if($request->task == 1)
            {

                $questions = WritingTestQuestion::where('course_id',$request->course_id)->where('task',1)->where('type',2)->get();
                if(count($questions) > 0)
                {
                    foreach($questions as $question)
                    {
                        $data .= "<option value='".$question->session_id."' >".$question->session_id."</option>";
                    }
                }
            }
            elseif($request->task == 2)
            {
                $questions = WritingTestQuestion::where('course_id',$request->course_id)->where('task',2)->where('type',2)->get();
                if(count($questions) > 0)
                {
                    foreach($questions as $question)
                    {
                        $data .= "<option value='".$question->session_id."' >".$question->session_id."</option>";
                    }
                }
            }
        }
       


        return $data;
    }
  
    public function student_computer_written_test_selection($student_id,$course_id)
    {
        $student = Student::findOrFail($student_id);
        $course = Course::findOrFail($course_id);
        return view('backend.modules.student.computer_written_test_selection',compact('student','course'));
    }
    public function student_writing_test_selection_get_modules(Request $request)
    {
        $modules = WritingTestQuestion::where('course_id',$request->course_id)
        ->where('type',$request->test_type)
        ->get()
        ->pluck('session');
        return view('backend.modules.test.modules',compact('modules'));
    }
    public function student_computer_written_test_selected(Request $request)
    {
        $student = Student::findOrFail($request['student_id']);
        $course = Course::findOrFail($request['course_id']);
        $type = $request['type'];
        $session = $request['session_id'];
        return view('backend.modules.student.computer_written_test',compact('student','course','type','session'));
    }
    public function student_computer_written_test($student_id,$course_id)
    {
        $student = Student::findOrFail($student_id);
        $course = Course::findOrFail($course_id);
        return view('backend.modules.student.computer_written_test',compact('student','course'));
    }
    public function student_computer_written_test_2($student_id,$course_id,$type,$session)
    {
        $student = Student::findOrFail($student_id);
        $course = Course::findOrFail($course_id);
        return view('backend.modules.student.computer_written_test_2',compact('student','course','type','session'));
    }
    public function student_computer_written_test_3($student_id,$course_id,$type,$session)
    {
        $student = Student::findOrFail($student_id);
        $course = Course::findOrFail($course_id);
        if($type == 1)
        {
            $questions = WritingTestQuestion::where('course_id',$course_id)
            ->where('type',$type)
            ->where('session',$session)
            ->get();
            return view('backend.modules.student.computer_written_test_3',compact('student','course','type','session','questions'));
        
        }
        else
        {
            $question = WritingTestQuestion::where('course_id',$course_id)
            ->where('type',$type)
            ->where('session',$session)
            ->first();
            return view('backend.modules.student.computer_written_test_4',compact('student','course','type','session','question'));
        
        }
        
    }
    public function student_writing_test_submit(Request $request)
    {
        $wt = new WritingTest();
        $wt->student_id = $request['student_id'];
        $wt->writing_test_question_id = $request['question_1'];
        $wt->answer = $request['task1_answer'];
        $wt->save();

        $wt = new WritingTest();
        $wt->student_id = $request['student_id'];
        $wt->writing_test_question_id = $request['question_2'];
        $wt->answer = $request['task2_answer'];
        $wt->save();
        return redirect()->back()->with(['success' => 1]);

    }
    public function student_pen_paper($id,$course_id)
    {
        $student = Student::findOrFail($id);
        $tutors = User::where('role',3)->where('status',1)->get();
        return view('backend.modules.student.pen_and_paper',compact('student','tutors','course_id'));
    }
    public function student_pen_paper_question(Request $request)
    {
        $question = WritingTestQuestion::where('course_id',$request->course_id)
        ->where('type',$request->test_type)
        ->where('session','W'.$request->session)
        ->where('task',$request->task)
        ->first();
        return view('backend.modules.student.pen_paper_question',compact('question'));
    }
    public function writing_pen_paper_save(Request $request)
    {
        $student = Student::findOrFail($request['student_id']);
        $question = WritingTestQuestion::where('course_id',$request['course_id'])
        ->where('type',$request['test_type'])
        ->where('session','W'.$request['session'])
        ->where('task',$request['task'])
        ->first();
        
        //$tutor = User::findOrFail($request['tutor_id']);

        $answer = new WritingTest();
        $answer->test_type = 2;
        $answer->student_id = $student->id;
        $answer->writing_test_question_id = $question->id;
        $answer->answer = "";
        if ($request->hasFile('answer_sheet')) {
            $image_folder = public_path('answers');
              
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
            $answer->answer_sheet = $fileName . $student->id . '.' . $extention;
        }
       // $answer->tutor_id = $tutor->id;
        $answer->save();
        return redirect()->back()->with(['saved_success' => 1]);
       
        // Mail::send('backend.emails.pen_paper_test_data', ['student' => $student,'question' => $question,'answer' => $answer], function ($message) use($tutor,$student)
        // {
        //     $message->from(config('app.from'), config('app.mail_from_name'));
        //     $message->subject("Pen & Paper Writing Test Of ". $student->first_name . " " . $student->last_name);
        //     $message->to('khalidjanuet@gmail.com');
        //     // $message->to('khalidjanuet@gmail.com ');
        // });

    }
}
