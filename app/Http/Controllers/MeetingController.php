<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ZoomChannel;
use App\ZoomChannelDay;
use App\ZoomDayDuration;
class MeetingController extends Controller
{
    public function index()
    {
        $channels = ZoomChannel::where('status',1)->orderBy('id','ASC')->get();
        return view('backend.modules.zoom.index',compact('channels'));
    }
    public function channel_days($id)
    {
        $channel = ZoomChannel::findOrFail($id);
        return view('backend.modules.zoom.days_index',compact('channel'));
    }
    public function day_durations($id)
    {
        $day = ZoomChannelDay::findOrFail($id);
        return view('backend.modules.zoom.durations_index',compact('day'));
    }
    public function day_create(Request $request)
    {
        // dd($request);
        for($i=1;$i<=$request['days'];$i++)
        {
            $day = new ZoomChannelDay();
            $day->zoom_channel_id = $request['channel_id'];
            $day->day = $request['day_'.$i];
            $day->save();

            $duration = new ZoomDayDuration();
            $duration->zoom_channel_day_id = $day->id;
            $duration->from_duration = "12:00";
            $duration->to_duration = "12:20";
            $duration->link = "";
            $duration->save();
            $duration = new ZoomDayDuration();
            $duration->zoom_channel_day_id = $day->id;
            $duration->from_duration = "12:20";
            $duration->to_duration = "12:40";
            $duration->link = "";
            $duration->save();
            $duration = new ZoomDayDuration();
            $duration->zoom_channel_day_id = $day->id;
            $duration->from_duration = "12:40";
            $duration->to_duration = "13:00";
            $duration->link = "";
            $duration->save();

            $duration = new ZoomDayDuration();
            $duration->zoom_channel_day_id = $day->id;
            $duration->from_duration = "13:00";
            $duration->to_duration = "13:20";
            $duration->link = "";
            $duration->save();
            $duration = new ZoomDayDuration();
            $duration->zoom_channel_day_id = $day->id;
            $duration->from_duration = "13:20";
            $duration->to_duration = "13:40";
            $duration->link = "";
            $duration->save();
            $duration = new ZoomDayDuration();
            $duration->zoom_channel_day_id = $day->id;
            $duration->from_duration = "13:40";
            $duration->to_duration = "14:00";
            $duration->link = "";
            $duration->save();

            $duration = new ZoomDayDuration();
            $duration->zoom_channel_day_id = $day->id;
            $duration->from_duration = "14:00";
            $duration->to_duration = "14:20";
            $duration->link = "";
            $duration->save();
            $duration = new ZoomDayDuration();
            $duration->zoom_channel_day_id = $day->id;
            $duration->from_duration = "14:20";
            $duration->to_duration = "14:40";
            $duration->link = "";
            $duration->save();
            $duration = new ZoomDayDuration();
            $duration->zoom_channel_day_id = $day->id;
            $duration->from_duration = "14:40";
            $duration->to_duration = "15:00";
            $duration->link = "";
            $duration->save();

            $duration = new ZoomDayDuration();
            $duration->zoom_channel_day_id = $day->id;
            $duration->from_duration = "15:00";
            $duration->to_duration = "15:20";
            $duration->link = "";
            $duration->save();
            $duration = new ZoomDayDuration();
            $duration->zoom_channel_day_id = $day->id;
            $duration->from_duration = "15:20";
            $duration->to_duration = "15:40";
            $duration->link = "";
            $duration->save();
            $duration = new ZoomDayDuration();
            $duration->zoom_channel_day_id = $day->id;
            $duration->from_duration = "15:40";
            $duration->to_duration = "16:00";
            $duration->link = "";
            $duration->save();

            $duration = new ZoomDayDuration();
            $duration->zoom_channel_day_id = $day->id;
            $duration->from_duration = "18:30";
            $duration->to_duration = "18:50";
            $duration->link = "";
            $duration->save();
        }
        return redirect()->back()->with(['saved_success' => 1]);
    }
    public function duration_create(Request $request)
    {
        // dd($request);
        for($i=1;$i<=$request['durations'];$i++)
        {
            $duration = new ZoomDayDuration();
            $duration->zoom_channel_day_id = $request['day_id'];
            $duration->from_duration = $request['duration_from_'.$i];
            $duration->to_duration = $request['duration_to_'.$i];
            $duration->link = $request['link_'.$i];
            $duration->save();
        }
        return redirect()->back()->with(['saved_success' => 1]);
    }
    
}
