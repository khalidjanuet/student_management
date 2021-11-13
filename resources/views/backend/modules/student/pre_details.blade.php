@extends('backend.layouts.master')
@section('title', 'Student Details')
@section('page_title','Student Details')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card no-b">
        <div class="card-header">
            
            <div class="d-flex justify-content-left">
                <div class="align-self-end" style="height:50px;">
                    <ul class="nav nav-material nav-material-white card-header-tabs" role="tablist">
                        <li class="nav-item blue" style="margin-top:0;">
                            <a class="nav-link active show" id="w6--tab1" data-toggle="tab" href="#w6-tab1" role="tab" aria-controls="tab1" aria-expanded="true" aria-selected="true">Overview</a>
                        </li>
                    </ul>
                </div>
                <div class="blue" style="padding:6px 20px;">
                    <h3 style="display:inline-block;color:#fff;" >Select Course: </h3>
                    <div style="display:inline-block;">
                        <select  class="form-control" id="course" onchange="show_student_details_for_this_course()">
                            <option value="0">Select a Course </option>
                            @foreach($student->courses as $course)
                                <option value="{{$course->course_id}}">{{$course->course->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body no-p">
            <div class="tab-content" id="v-pills-tabContent2">
                <!-- Overview tab data -->
                <div class="tab-pane fade active show" id="w6-tab1" role="tabpanel" aria-labelledby="w6-tab1">
                    <div class="row">
                        
                        <div class="col-md-12" style="margin-top:10px;">
                            <div class="card">
                                <div class="card-header white">
                                    <strong> My Information</strong>
                                </div>
                                <div class="card-body"  style="overflow-x:scroll;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="image m-3 text-center">
                                                <img src="{{asset('img/student')}}/{{$student->profile_image}}" alt="" width="100" height="100">
                                            </div>
                                            <div>
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <table class="table">

                                            <tbody> 
                                            <tr>
                                                <td style="width:250px;border:none;">Student ID</td>
                                                <td style="border:none;">{{$student->id}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Name</td>
                                                <td style="border:none;">{{$student->first_name}} {{$student->last_name}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Email</td>
                                                <td style="border:none;">{{$student->email}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Location</td>
                                                <td style="border:none;">{{$student->location}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Mobile #</td>
                                                <td style="border:none;">{{$student->phone}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">WhatsApp #</td>
                                                <td style="border:none;">{{$student->whatsapp}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Module</td>
                                                <td style="border:none;">{{$student->module}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Test Attempted</td>
                                                <td style="border:none;">{{$student->attempt}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Previous Score</td>
                                                <td style="border:none;">{{$student->previous_score}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Overall Target Score</td>
                                                <td style="border:none;">{{$student->overall_target_score}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Listening Target Score</td>
                                                <td style="border:none;">{{$student->listening_target_score}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Reading Target Score</td>
                                                <td style="border:none;">{{$student->reading_target_score}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Writing Target Score</td>
                                                <td style="border:none;">{{$student->writing_target_score}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Speaking Target Score</td>
                                                <td style="border:none;">{{$student->speaking_target_score}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Problems</td>
                                                <td style="border:none;">{{$student->problems}}</td>
                                            </tr>
                                            {{--<tr>
                                                <td style="width:250px;border:none;">Address (Street)</td>
                                                <td style="border:none;">{{$student->street_1}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Address (Street 2)</td>
                                                <td style="border:none;">{{$student->street_2}}</td>
                                            </tr>--}}
                                            <tr>
                                                <td style="width:250px;border:none;">City</td>
                                                <td style="border:none;">{{$student->city}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Region</td>
                                                <td style="border:none;">{{$student->region}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Zipcode</td>
                                                <td style="border:none;">{{$student->zipcode}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Country</td>
                                                <td style="border:none;">{{$student->country}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Session Day & Time</td>
                                                <td style="border:none;">{{$student->session_day_time}}</td>
                                            </tr>
                                            
                                           
                                            <tr>
                                                <td style="width:250px;border:none;">Status</td>
                                                <td style="border:none;">{{$student->status == 1 ? 'Active' : 'Not Active'}}</td>
                                            </tr>


                                            </tbody>

                                            </table>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                      
                        
                    </div>
                   
                </div>
                <!-- Attendance Tab Data -->
               
            </div>

        </div>
    </div>
</div>


@endsection
<script>
    function show_student_details_for_this_course()
    {
        var course_id = $('#course').val();
        var student_id = "{{$student->id}}";
        var url = "{{url('student-detail')}}"+'/'+student_id + "/" + course_id;
        window.location.href = url;
    }

</script>