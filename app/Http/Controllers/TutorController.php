<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WritingTest;
use App\SpeakingTest;
use Auth;
use App\ZoomDayDuration;
use Zoom;
use Carbon\Carbon;
class TutorController extends Controller
{
    public function dashboard()
    {
        return view('backend.modules.tutor.dashboard');

    }
    public function writing_tests()
    {
        $tests = WritingTest::where('status',0)->orderBy('created_at','DESC')->get();
        return view('backend.modules.tutor.writing_tests',compact('tests'));
    }
    public function speaking_tests()
    {
       // $tests = SpeakingTest::where('status',0)->orderBy('created_at','DESC')->get();
       $durations = ZoomDayDuration::where('is_booked',1)->orderBy('created_at','ASC')->get();
        return view('backend.modules.tutor.speaking_tests',compact('durations'));
    }
    public function tutor_computer_test_checking($test_id)
    {
        $test = WritingTest::findOrFail($test_id);
       
        return view('backend.modules.tutor.test_checking',compact('test'));
    }
    public function book_writing_test($id) 
    {
        $test = WritingTest::findOrFail($id);
        $test->tutor_id = Auth::user()->id;
        $test->save();
        return redirect()->back()->with(['booked_success' => 1]);
    }
    public function tutor_book_speaking_test($id)
    {
        $duration = ZoomDayDuration::findOrFail($id);
        $user = Zoom::user()->find($duration->day->channel->email);
        $meeting = Zoom::meeting()->make([
            'topic' => $duration->student->first_name . " " . $duration->student->last_name . ": IELTS Speaking Test",
            'type' => 2,
            'start_time' => new Carbon($duration->day->day . " " . $duration->from_duration), // best to use a Carbon instance here.
            'duration' => 20,
            'timezone' => "Asia/Calcutta",
          ]);
          $meeting->settings()->make([
              'host_video' => true,
              'participant_video' => true,
              'in_meeting' => true,
            'join_before_host' => false,
            'approval_type' => 2,
            'enforce_login' => false,
            'waiting_room' => false,
          ]);
          $user->meetings()->save($meeting);
          $latest = $user->meetings()->first();

          $duration->tutor_id = Auth::user()->id;
          $duration->start_link = $latest->start_url;
          $duration->link = $latest->join_url;
          $duration->uuid = $latest->uuid;
          $duration->host_id = $latest->host_id; 
          $duration->save();
          return redirect()->back()->with(['booked_success' => 1]);
    }
}
