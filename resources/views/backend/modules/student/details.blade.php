@extends('backend.layouts.master')
@section('title', 'Student Details')
@section('styles')
<style>
    .topic-container{
        box-shadow: 0px 3px 6px #00000029;
        min-height:250px;
        margin-bottom:20px;
    }
    .heading > h1{
        font-size: 34px;
    font-weight: 700;
    letter-spacing: 2px;
    color: #FC7B00;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection
@section('page_title','Student Details')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card no-b">
        <div class="card-header">
            
            <div class="d-flex justify-content-between">
                <div class="align-self-end">
                    <ul class="nav nav-material nav-material-white card-header-tabs" role="tablist">
                        <li class="nav-item blue">
                            <a class="nav-link active show" id="w6--tab1" data-toggle="tab" href="#w6-tab1" role="tab" aria-controls="tab1" aria-expanded="true" aria-selected="true">Overview</a>
                        </li>
                        <li class="nav-item blue">
                            <a class="nav-link" id="w6--tab2" data-toggle="tab" href="#w6-tab2" role="tab" aria-controls="tab2" aria-selected="false">Attendance</a>
                        </li>
                        <li class="nav-item blue">
                            <a class="nav-link" id="w6--tab3" data-toggle="tab" href="#w6-tab3" role="tab" aria-controls="tab3" aria-selected="false">Results</a>
                        </li>
                        <li class="nav-item blue">
                            <a class="nav-link" id="w6--tab4" data-toggle="tab" href="#w6-tab4" role="tab" aria-controls="tab4" aria-selected="false">Feedbacks</a>
                        </li>
                        <li class="nav-item blue">
                            <a class="nav-link" id="w6--tab5" data-toggle="tab" href="#w6-tab5" role="tab" aria-controls="tab5" aria-selected="false">Online Test</a>
                        </li>
                    </ul>
                   
                </div>

            </div>
        </div>
        <div class="card-body no-p">
            <div class="tab-content" id="v-pills-tabContent2">
                <!-- Overview tab data -->
                <div class="tab-pane fade active show" id="w6-tab1" role="tabpanel" aria-labelledby="w6-tab1">
                    <div class="row">
                        
                        <div class="col-md-7" style="margin-top:10px;">
                            <div class="card">
                                <div class="card-header white">
                                    <strong> Course Overview</strong>
                                </div>
                                <div class="card-body"  style="overflow-x:scroll;">
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <table class="table">

                                            <tbody> 
                                            <!-- <tr>
                                                <td style="width:250px;border:none;">Course ID</td>
                                                <td style="border:none;"><a download href="{{asset('answers_pdfs')}}/question.pdf">File</a></td>
                                            </tr> -->
                                            <tr>
                                                <td style="width:250px;border:none;">Course ID</td>
                                                <td style="border:none;">{{$student_course->course->id}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Course Name</td>
                                                <td style="border:none;">{{$student_course->course->name}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Course Duration</td>
                                                <td style="border:none;">{{$student_course->course->duration}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Course Fee</td>
                                                <td style="border:none;">{{$student_course->course->fee}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Mock Tests</td>
                                                <td style="border:none;">{{$student_course->course->mock_tests}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Listening Tests</td>
                                                <td style="border:none;">{{$student_course->course->listening_tests}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Reading Tests</td>
                                                <td style="border:none;">{{$student_course->course->reading_tests}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Writing Test Task 1</td>
                                                <td style="border:none;">{{$student_course->course->writing_tests}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Writing Test Task 2</td>
                                                <td style="border:none;">{{$student_course->course->writing_tests_2}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Speaking Tests </td>
                                                <td style="border:none;">{{$student_course->course->speaking_tests}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Interactive Sessions</td>
                                                <td style="border:none;">{{$student_course->course->interactive_sessions}}</td>
                                            </tr>
                                            
                                           
                                           


                                            </tbody>

                                            </table>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5" style="margin-top:10px;">
                            <div class="card">
                                <div class="card-header white">
                                    <strong> Attendance Overview</strong>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class=" text-center p-5" style="background:#efefef;margin-top:20px;">
                                                <span class="overview-panel-icon">A</span>
                                                <span class="overview-panel-text">{{$attendance}}/{{$student_course->course->interactive_sessions}}</span>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="row p-3" style="padding-left:0 !important;">
                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-xl btn-primary" style="background:#ff7b00;" onclick="show_report_card_url()">Copy Report Card URL</button>
                                        </div>
                                    </div>
                                    
                                   
                                </div>
                            </div>
                            <div class="card mt-2">
                                <div class="card-header white">
                                    <strong> Payment History</strong>
                                </div>
                                <div class="card-body"  style="overflow-x:scroll;">
                                    
                                    <table class="table table-bordered table-hover">
                                        <tbody> 
                                        @if($fee)
                                        <tr>
                                            <td style="width:250px;">Student Name</td>
                                            <td>{{$fee->student->first_name}} {{$fee->student->last_name}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Student Email</td>
                                            <td>{{$fee->student->email}}</td>
                                        </tr>

                                        <tr>
                                            <td style="width:250px;">Course</td>
                                            <td>{{$fee->course->name}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Total Fees</td>
                                            <td>{{$fee->total}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Discount</td>
                                            <td>{{$fee->discount}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Net Total</td>
                                            <td>{{$fee->net_total}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Total Paid Amount</td>
                                            <td>{{$fee->paid}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Remaining</td>
                                            <td>{{$fee->remaining}}</td>
                                        </tr>

                                        <tr>
                                            <td style="width:250px;">Paid Amount Now</td>
                                            <td>{{$fee->paid_now}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Location</td>
                                            <td>{{$fee->location}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Reason</td>
                                            <td>{{$fee->reason}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Due Date</td>
                                            <td><span class="badge badge-success">{{Carbon\Carbon::parse($fee->due_date)->format('d-m-Y')}}</span></td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Admission Officer Name</td>
                                            <td>{{$fee->admission_officer_name}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Team Leader Name</td>
                                            <td>{{$fee->team_leader_name}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Payment Method</td>
                                            <td>{{$fee->payment_method}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Outside Country (Bank Name)</td>
                                            <td>{{$fee->outside}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Message</td>
                                            <td>{{$fee->message}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Receipt Email</td>
                                            <td>{{$fee->email}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Receipt</td>
                                            <td><a href="{{asset('receipts')}}/{{$fee->receipt}}" target="_blank">{{$fee->receipt}}</td>
                                        </tr>
                                        @endif

                                        </tbody>

                                    </table>
                                    
                                   
                                </div>
                            </div>
                            <div class="card mt-2">
                                <div class="card-header white">
                                    <strong> Latest Feedbacks</strong>
                                </div>
                                <div class="card-body"  style="overflow-x:scroll;">
                                    
                                    <table class="table table-bordered table-hover">
                                        <tbody> 
                                        @if($fee)
                                        <tr>
                                            <td style="width:250px;">Student Name</td>
                                            <td>{{$fee->student->first_name}} {{$fee->student->last_name}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Student Email</td>
                                            <td>{{$fee->student->email}}</td>
                                        </tr>

                                        <tr>
                                            <td style="width:250px;">Course</td>
                                            <td>{{$fee->course->name}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Total Fees</td>
                                            <td>{{$fee->total}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Discount</td>
                                            <td>{{$fee->discount}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Net Total</td>
                                            <td>{{$fee->net_total}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Total Paid Amount</td>
                                            <td>{{$fee->paid}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Remaining</td>
                                            <td>{{$fee->remaining}}</td>
                                        </tr>

                                        <tr>
                                            <td style="width:250px;">Paid Amount Now</td>
                                            <td>{{$fee->paid_now}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Location</td>
                                            <td>{{$fee->location}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Reason</td>
                                            <td>{{$fee->reason}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Due Date</td>
                                            <td><span class="badge badge-success">{{Carbon\Carbon::parse($fee->due_date)->format('d-m-Y')}}</span></td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Admission Officer Name</td>
                                            <td>{{$fee->admission_officer_name}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Team Leader Name</td>
                                            <td>{{$fee->team_leader_name}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Payment Method</td>
                                            <td>{{$fee->payment_method}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Outside Country (Bank Name)</td>
                                            <td>{{$fee->outside}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Message</td>
                                            <td>{{$fee->message}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Receipt Email</td>
                                            <td>{{$fee->email}}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px;">Receipt</td>
                                            <td><a href="{{asset('receipts')}}/{{$fee->receipt}}" target="_blank">{{$fee->receipt}}</td>
                                        </tr>
                                        @endif

                                        </tbody>

                                    </table>
                                    
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top:10px;">
                            <div class="card">
                                <div class="card-header white">
                                    <strong> Student Forum</strong>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach($topics as $topic)
                                        <div class="col-md-12 topic-container">
                                            <a href="{{route('forum-topic-details',['id' => $topic->id])}}">
                                            <div class="row">
                                               <div class="col-md-3" style="padding-top:30px;">
                                                    <div class="image m-3 text-center">
                                                        <img src="{{asset('img/forum')}}/{{$topic->img}}" alt="" width="100" height="100">
                                                    </div>
                                               </div>
                                               <div class="col-md-5" style="padding-top:60px;">
                                                    <div class="heading">
                                                        <h1>{{$topic->heading}}</h1>
                                                    </div>
                                                    <div class="description">
                                                        <p>Some sample description about this...</p>
                                                    </div>
                                                    
                                               </div>
                                               <div class="col-md-4" style="padding-top:30px;text-align:center;">
                                                    <div class="user">
                                                        @if($topic->student->profile_image)
                                                        <img class="user_avatar" style="display:inline-block;" src="{{asset('img/student')}}/{{$topic->student->profile_image}}" alt="User Image">
                                                        @else
                                                        <img class="user_avatar" style="display:inline-block;" src="http://localhost:8080/student_management/public/img/dummy/u1.png" alt="User Image">
                                                        @endif
                                                        <h3 style="font-weight:500;margin-top:5px;">{{$topic->student->first_name}} {{$topic->student->last_name}}</h3>
                                                    </div>
                                                    <div class="rating">
                                                        <div class="s-36 icon-star" style="color:#FC7B00;display:inline-block;"></div>
                                                        <div class="s-36 icon-star" style="color:#FC7B00;display:inline-block;"></div>
                                                        <div class="s-36 icon-star" style="color:#FC7B00;display:inline-block;"></div>
                                                        <div class="s-36 icon-star-o" style="color:#FC7B00;display:inline-block;"></div>
                                                        <div class="s-36 icon-star-o" style="color:#FC7B00;display:inline-block;"></div>
                                                    </div>
                                                    <div class="comments">
                                                        <h3 style="font-weight:500;margin-top:10px;">10 Comments</h3>
                                                    </div>
                                               </div>
                                            </div>
                                            </a>
                                        </div>
                                        @endforeach
                                     
                                       
                                       
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top:10px;">
                            <div class="card">
                                <div class="card-header white">
                                    <strong> Create New Topic</strong>
                                </div>
                                <div class="card-body">
                                <form action="{{route('forum-topic-save')}}" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        
                                        <div class="col-md-3">
                                            <h5>Topic Heading:<span style="color:red;">*</span></h5>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="heading" id="" placeholder="Heading" required value="{{old('heading')}}"> 
                                                @if($errors->first('heading'))
                                                    <p class="text-danger">{{$errors->first('heading')}}</p>
                                                @endif
                                            </div>
                                        </div>
                                        
                                    </div>
                                   
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h5>Topic Image:</h5>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="file" class="form-control" name="image" id="">
                                                @if($errors->first('image'))
                                                    <p class="text-danger">{{$errors->first('image')}}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h5>Description:<span style="color:red;">*</span></h5>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                            <textarea id="summernote" name="description" rows="10"></textarea>
                                                @if($errors->first('description'))
                                                    <p class="text-danger">{{$errors->first('description')}}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            {{csrf_field()}}
                                            <input type="submit" class="btn btn-success btn-lg btn-block" value="Submit" style="background:#ff7b00;width:300px;margin:10px auto;">
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="row">
                        
                    </div>
                   
                </div>
                <!-- Attendance Tab Data -->
                <div class="tab-pane fade" id="w6-tab2" role="tabpanel" aria-labelledby="w6-tab2">
                    <div class="row p-3">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary mt-1" style="background:#ff7b00;" onclick="show_attendance_record();">Attendance Record</button>
                            <button class="btn btn-primary mt-1" style="background:#ff7b00;" onclick="show_attendance_feedback();">Attendance FeedBack</button>
                        </div>
                    </div>
                    <div class="row" id="attendance_record">
                        
                        <div class="col-md-6" style="margin-top:10px;">
                            <div class="card">
                                <div class="card-header white">
                                    <input type="date" id="attendance_date" class="form-control" style="display:inline-block;width:200px;margin-top:10px;">
                                    <select name="session" id="attendance_session" class="form-control" style="display:inline-block;width:150px !important;margin-top:10px;">
                                        <option value="0"> Select Module</option>
                                        @foreach($sessions as $session)
                                        <option value="{{$session->name}}">{{$session->name}}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-success" style="display:inline-block;width:40px;height:40px;background:#ff7b00;" onclick="sort_attendance()"><i class="icon-search"></i></button>
                                </div>
                                <div class="card-body" style="overflow-x:scroll;" >
                                    <table class="table table-bordered" id="attendance_div">
                                      
                                        <tbody>
                                            <tr class="attendance-table-row">
                                                <td>Date</td>
                                                <td>Time</td>
                                                <td>Tutor</td>
                                                <td>Module</td>
                                                <td>Comments</td>
                                            </tr>
                                           
                                            @foreach($attendances as $a)
                                                <tr class="attendance-table-row">
                                                    <td>{{Carbon\Carbon::parse($a->date)->format('d-m-Y')}}</td>
                                                    <td>{{$a->time}}</td>
                                                    <td>{{$a->tutor_name}}</td>
                                                    <td>{{$a->session}}</td>
                                                    <td>{{$a->comments}}</td>
                                                </tr>
                                            @endforeach
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top:10px;">
                            <div class="card">
                                <div class="card-header white">
                                    <strong> Attendance Overview</strong>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class=" text-center p-5" style="background:#efefef;margin-top:20px;">
                                                <span class="overview-panel-icon">A</span>
                                                <span class="overview-panel-text">{{$attendance}}/{{$student_course->course->interactive_sessions}}</span>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="row p-5">
                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-xl btn-primary" style="background:#ff7b00;" onclick="show_report_card_url()">Copy Report Card URL</button>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row" id="attendance_feedback" style="display:none;">
                        @foreach($att_feedbacks as $feedback)
                        <div class="card bg-light mb-3">
                            <div class="card-header feedback-header" >{{$feedback->date}} <span class="feedback-tutor-name">Tutor: {{$feedback->tutor_name}}</span></div>
                            <div class="card-body">
                               
                                <p class="card-text">{{$feedback->feedback}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Practice Test Tab Data -->
                <div class="tab-pane fade" id="w6-tab3" role="tabpanel" aria-labelledby="w6-tab3">
                    <div class="row p-3">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary mt-1" style="background:#ff7b00;" onclick="show_practice_score();">Practice Set Score</button>
                                <button class="btn btn-primary mt-1" style="background:#ff7b00;" onclick="show_mock_score();">Mock Test Score</button>
                                <!-- <button class="btn btn-primary mt-1" style="background:#ff7b00;" onclick="show_practice_suggestions();">Practice Set Suggestions</button> -->
                            </div>
                        </div>
                        <div class="row" id="practice_score">
                            
                            <div class="col-md-9" style="margin-top:10px;">
                                <div class="card">
                                    <div class="card-header white">
                                        <strong style="line-height:38px;">Practice Set Results</strong>
                                        <select name="session" id="practice_filter" class="form-control" style="display:inline-block;width:80px;float:right;" onchange="show_hide_practice_results()">
                                            <option value="0">All</option>
                                            <option value="1">L</option>
                                            <option value="2">R</option>
                                            <option value="3">W</option>
                                            <option value="4">S</option>
                                        </select>
                                       
                                    </div>
                                    <div class="card-body">
                                        @if($student_course->course->listening_tests > 0)
                                        <div class="card bg-light mb-3" id="practice_1">
                                            <div class="card-header feedback-header" >Listening</div>
                                            <div class="card-body"  style="overflow-x:scroll;">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Practice Name</td>
                                                            @for($i=1;$i<=$student_course->course->listening_tests;$i++)
                                                            
                                                            <td style="cursor:pointer;">L{{$i}}</td>
                                                           
                                                            @endfor
                                                        </tr>
                                                        <tr>
                                                            <td>Score</td>
                                                            <?php $count = 0; $l_total = 0;?>
                                                            @for($i=1;$i<=$student_course->course->listening_tests;$i++)
                                                                @if($student->les->where('session','L'.$i)->where('test_type',1)->pluck('id')->first())
                                                                    <?php $count++;$l_total+= $student->les->where('session','L'.$i)->where('test_type',1)->pluck('total_score')->first();?>
                                                                    <td style="cursor:pointer;" onclick="show_session_info(1,{{$student->les->where('session','L'.$i)->where('test_type',1)->pluck('id')->first()}});">{{$student->les->where('session','L'.$i)->where('test_type',1)->pluck('total_score')->first()}}</td>
                                                                @else
                                                                    <td></td>
                                                                @endif
                                                            @endfor
                                                        </tr>
                                                        <tr>
                                                           
                                                            <?php if($l_total > 0 ) { $o = ($l_total)/$count; $f = $o - (int)$o;  if($f >= 0.00 && $f < 0.25){$o = (int)$o+0.0;}elseif($f >=0.25 && $f<=0.50 ){$o = (int)$o+0.5;}elseif($f >0.50 && $f<=0.99 ){$o+=1;$o = (int)$o+0.0;} $l_overall_score = $o;}else{$l_overall_score = 0;} ?>   
                                                               
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student_course->course->reading_tests > 0)
                                        <div class="card bg-light mb-3" id="practice_2">
                                            <div class="card-header feedback-header" >Reading</div>
                                            <div class="card-body" style="overflow-x:scroll;">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Practice Name</td>
                                                            @for($i=1;$i<=$student_course->course->reading_tests;$i++)
                                                            
                                                            <td style="cursor:pointer;">R{{$i}}</td>
                                                           
                                                            @endfor
                                                        </tr>
                                                        <tr>
                                                            <td>Score</td>
                                                            <?php $count = 0; $r_total = 0;?>
                                                            @for($i=1;$i<=$student_course->course->reading_tests;$i++)
                                                                @if($student->res->where('session','R'.$i)->where('test_type',1)->pluck('id')->first())
                                                                    <?php $count++;$r_total+= $student->res->where('session','R'.$i)->where('test_type',1)->pluck('total_score')->first();?>
                                                                    <td style="cursor:pointer;" onclick="show_session_info(2,{{$student->res->where('session','R'.$i)->where('test_type',1)->pluck('id')->first()}});">{{$student->res->where('session','R'.$i)->where('test_type',1)->pluck('total_score')->first()}}</td>
                                                                @else
                                                                    <td></td>
                                                                @endif
                                                            @endfor
                                                        </tr>
                                                        <tr>
                                                          
                                                            <?php if($r_total > 0 ) { $o = ($r_total)/$count; $f = $o - (int)$o;  if($f >= 0.00 && $f < 0.25){$o = (int)$o+0.0;}elseif($f >=0.25 && $f<=0.50 ){$o = (int)$o+0.5;}elseif($f >0.50 && $f<=0.99 ){$o+=1;$o = (int)$o+0.0;} $r_overall_score = $o;}else{$r_overall_score = 0;} ?>   
                                                              
                                                        
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student_course->course->writing_tests > 0)
                                        <div class="card bg-light mb-3" id="practice_3_1">
                                            <div class="card-header feedback-header" >Writing Test (Task 1)</div>
                                            <div class="card-body" style="overflow-x:scroll;">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Practice Name</td>
                                                            @for($i=1;$i<=$student_course->course->writing_tests;$i++)
                                                            
                                                            <td style="cursor:pointer;">W{{$i}}</td>
                                                           
                                                            @endfor
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>Score</td>
                                                            <?php $count = 0;$flag=0; $w_total = 0;?>
                                                            @for($i=1;$i<=$student_course->course->writing_tests;$i++)
                                                                @if($student->wes->where('session','W'.$i)->where('task',1)->where('test_type',1)->pluck('id')->first())
                                                                    <?php $count++;$w_total+= $student->wes->where('session','W'.$i)->where('task',1)->where('test_type',1)->pluck('total_score')->first();?>
                                                                    <td style="cursor:pointer;" onclick="show_session_info(3,{{$student->wes->where('session','W'.$i)->where('task',1)->where('test_type',1)->pluck('id')->first()}});">{{$student->wes->where('session','W'.$i)->where('task',1)->where('test_type',1)->pluck('total_score')->first()}}</td>
                                                                @else
                                                                    <td></td>
                                                                @endif
                                                            @endfor
                                                        </tr>
                                                        <tr>
                                                            <?php if($w_total > 0 ) { $o = ($w_total)/$count; $f = $o - (int)$o;  if($f >= 0.00 && $f < 0.25){$o = (int)$o+0.0;}elseif($f >=0.25 && $f<=0.50 ){$o = (int)$o+0.5;}elseif($f >0.50 && $f<=0.99 ){$o+=1;$o = (int)$o+0.0;} $w_overall_score = $o;}else{$w_overall_score = 0;} ?>   
                                                             
                                                        
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student_course->course->writing_tests_2 > 0)
                                        <div class="card bg-light mb-3" id="practice_3_2">
                                            <div class="card-header feedback-header" >Writing Test (Task 2)</div>
                                            <div class="card-body" style="overflow-x:scroll;">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Practice Name</td>
                                                            @for($i=1;$i<=$student_course->course->writing_tests_2;$i++)
                                                                <td style="cursor:pointer;">W{{$i}}</td>
                                                           
                                                            @endfor
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>Score</td>
                                                            <?php $count = 0; $w2_total = 0;?>
                                                            @for($i=1;$i<=$student_course->course->writing_tests_2;$i++)
                                                                @if($student->wes->where('session','W'.$i)->where('task',2)->where('test_type',1)->pluck('id')->first())
                                                                    <?php $count++;$w2_total+= $student->wes->where('session','W'.$i)->where('task',2)->where('test_type',1)->pluck('total_score')->first();?>
                                                                    <td style="cursor:pointer;" onclick="show_session_info(3,{{$student->wes->where('session','W'.$i)->where('task',2)->where('test_type',1)->pluck('id')->first()}});">{{$student->wes->where('session','W'.$i)->where('task',2)->where('test_type',1)->pluck('total_score')->first()}}</td>
                                                                @else
                                                                    <td></td>
                                                                @endif
                                                            @endfor
                                                        </tr>
                                                        <tr>
                                                           
                                                            <?php if($w2_total > 0 ) { $o = ($w2_total)/$count; $f = $o - (int)$o;  if($f >= 0.00 && $f < 0.25){$o = (int)$o+0.0;}elseif($f >=0.25 && $f<=0.50 ){$o = (int)$o+0.5;}elseif($f >0.50 && $f<=0.99 ){$o+=1;$o = (int)$o+0.0;} $w2_overall_score = $o;}else{$w2_overall_score = 0;} ?>   
                                                           
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student_course->course->speaking_tests > 0)
                                        <div class="card bg-light mb-3" id="practice_4">
                                            <div class="card-header feedback-header" >Speaking</div>
                                            <div class="card-body"  style="overflow-x:scroll;">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Practice Name</td>
                                                            @for($i=1;$i<=$student_course->course->speaking_tests;$i++)
                                                            
                                                            <td style="cursor:pointer;">S{{$i}}</td>
                                                           
                                                            @endfor
                                                        </tr>
                                                        <tr>
                                                            <td>Score</td>
                                                            <?php $count = 0; $s_total = 0;?>
                                                            @for($i=1;$i<=$student_course->course->speaking_tests;$i++)
                                                                @if($student->ses->where('session','S'.$i)->where('test_type',1)->pluck('id')->first())
                                                                    <?php $count++;$s_total+= $student->ses->where('session','S'.$i)->where('test_type',1)->pluck('total_score')->first();?>
                                                                    <td style="cursor:pointer;" onclick="show_session_info(4,{{$student->ses->where('session','S'.$i)->where('test_type',1)->pluck('id')->first()}});">{{$student->ses->where('session','S'.$i)->where('test_type',1)->pluck('total_score')->first()}}</td>
                                                                @else
                                                                    <td></td>
                                                                @endif
                                                            @endfor
                                                        </tr>
                                                        <tr>
                                                          
                                                            <?php if($s_total > 0 ) { $o = ($s_total)/$count; $f = $o - (int)$o;  if($f >= 0.00 && $f < 0.25){$o = (int)$o+0.0;}elseif($f >=0.25 && $f<=0.50 ){$o = (int)$o+0.5;}elseif($f >0.50 && $f<=0.99 ){$o+=1;$o = (int)$o+0.0;} $s_overall_score = $o;}else{$s_overall_score = 0;} ?>   
                                                           
                                                        
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" style="margin-top:10px;">
                                <div class="card">
                                    <div class="card-header white">
                                        <strong> Overall Score</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php $over_all_score = 0; $tests =0;?>
                                            @if($student_course->course->listening_tests > 0)
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 5px 15px;">L</span>
                                                    <span class="overview-panel-text"><?php $over_all_score+=$l_overall_score;$tests++; ?>{{$l_overall_score}}</span>
                                                </div>
                                            </div>
                                            @endif 
                                            @if($student_course->course->reading_tests > 0)
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 5px 15px;">R</span>
                                                    <span class="overview-panel-text"><?php $over_all_score+=$r_overall_score;$tests++; ?>{{$r_overall_score}}</span>
                                                </div>
                                            </div> 
                                            @endif
                                            @if($student_course->course->writing_tests > 0)
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 10px;letter-spacing:-3px;">W 1</span>
                                                    <span class="overview-panel-text"><?php $over_all_score+=$w_overall_score;$tests++; ?>{{$w_overall_score}}</span>
                                                </div>
                                            </div>
                                            @endif
                                            @if($student_course->course->writing_tests_2 > 0)
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 10px;letter-spacing:-3px">W 2</span>
                                                    <span class="overview-panel-text"><?php $over_all_score+=$w2_overall_score;$tests++; ?>{{$w2_overall_score}}</span>
                                                </div>
                                            </div>
                                            @endif
                                            @if($student_course->course->speaking_tests > 0) 
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 5px 15px;">S</span>
                                                    <span class="overview-panel-text"><?php $over_all_score+=$s_overall_score;$tests++; ?>{{$s_overall_score}}</span>
                                                </div>
                                            </div>  
                                            @endif
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 5px 15px;">T</span>
                                                    <span class="overview-panel-text"><?php $o = ($over_all_score)/$tests; $f = $o - (int)$o;  if($f >= 0.00 && $f < 0.25){$o = (int)$o+0.0;}elseif($f >=0.25 && $f<=0.50 ){$o = (int)$o+0.5;}elseif($f >0.50 && $f<=0.99 ){$o+=1;$o = (int)$o+0.0;} ?>{{$o}}</span>
                                                </div>
                                            </div>  
                                        </div>
                                        
                                    
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row" id="mock_score" style="display:none;">
                            
                            <div class="col-md-9" style="margin-top:10px;">
                                <div class="card">
                                    <div class="card-header white">
                                        <strong style="line-height:38px;">Mock Test Results</strong>
                                        <select name="session" id="mock_filter" class="form-control" style="display:inline-block;width:80px;float:right;" onchange="show_hide_mock_results()">
                                            <option value="0"> All</option>    
                                            <option value="1">L</option>
                                            <option value="2">R</option>
                                            <option value="3">W</option>
                                            <option value="4">S</option>
                                        </select>
                                       
                                    </div>
                                    <div class="card-body">
                                        @if($student_course->course->listening_tests > 0)
                                        <div class="card bg-light mb-3" id="mock_1">
                                            <div class="card-header feedback-header" >Listening</div>
                                            <div class="card-body"  style="overflow-x:scroll;">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Practice Name</td>
                                                            @for($i=1;$i<=$student_course->course->listening_tests;$i++)
                                                            
                                                            <td style="cursor:pointer;">L{{$i}}</td>
                                                           
                                                            @endfor
                                                        </tr>
                                                        <tr>
                                                            <td>Score</td>
                                                            <?php $count = 0; $l_total = 0;?>
                                                            @for($i=1;$i<=$student_course->course->listening_tests;$i++)
                                                                @if($student->les->where('session','L'.$i)->where('test_type',2)->pluck('id')->first())
                                                                    <?php $count++;$l_total+= $student->les->where('session','L'.$i)->where('test_type',2)->pluck('total_score')->first();?>
                                                                    <td style="cursor:pointer;" onclick="show_session_info(1,{{$student->les->where('session','L'.$i)->where('test_type',2)->pluck('id')->first()}});">{{$student->les->where('session','L'.$i)->where('test_type',2)->pluck('total_score')->first()}}</td>
                                                                @else
                                                                    <td></td>
                                                                @endif
                                                            @endfor
                                                        </tr>
                                                        <tr>
                                                          
                                                            <?php if($l_total > 0 ) { $o = ($l_total)/$count; $f = $o - (int)$o;  if($f >= 0.00 && $f < 0.25){$o = (int)$o+0.0;}elseif($f >=0.25 && $f<=0.50 ){$o = (int)$o+0.5;}elseif($f >0.50 && $f<=0.99 ){$o+=1;$o = (int)$o+0.0;} $l_overall_score = $o;}else{$l_overall_score = 0;} ?>   
                                                           
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student_course->course->reading_tests > 0)
                                        <div class="card bg-light mb-3" id="mock_2">
                                            <div class="card-header feedback-header" >Reading</div>
                                            <div class="card-body"  style="overflow-x:scroll;">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Practice Name</td>
                                                            @for($i=1;$i<=$student_course->course->reading_tests;$i++)
                                                            
                                                            <td style="cursor:pointer;">R{{$i}}</td>
                                                           
                                                            @endfor
                                                        </tr>
                                                        <tr>
                                                            <td>Score</td>
                                                            <?php $count = 0; $r_total = 0;?>
                                                            @for($i=1;$i<=$student_course->course->reading_tests;$i++)
                                                                @if($student->res->where('session','R'.$i)->where('test_type',2)->pluck('id')->first())
                                                                    <?php $count++;$r_total+= $student->res->where('session','R'.$i)->where('test_type',2)->pluck('total_score')->first();?>
                                                                    <td style="cursor:pointer;" onclick="show_session_info(2,{{$student->res->where('session','R'.$i)->where('test_type',2)->pluck('id')->first()}});">{{$student->res->where('session','R'.$i)->where('test_type',2)->pluck('total_score')->first()}}</td>
                                                                @else
                                                                    <td></td>
                                                                @endif
                                                            @endfor
                                                        </tr>
                                                        <tr>
                                                           
                                                            <?php if($r_total > 0 ) { $o = ($r_total)/$count; $f = $o - (int)$o;  if($f >= 0.00 && $f < 0.25){$o = (int)$o+0.0;}elseif($f >=0.25 && $f<=0.50 ){$o = (int)$o+0.5;}elseif($f >0.50 && $f<=0.99 ){$o+=1;$o = (int)$o+0.0;} $r_overall_score = $o;}else{$r_overall_score = 0;} ?>   
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student_course->course->writing_tests > 0)
                                        <div class="card bg-light mb-3" id="mock_3_1">
                                            <div class="card-header feedback-header" >Writing Test (Task 1)</div>
                                            <div class="card-body"  style="overflow-x:scroll;">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Practice Name</td>
                                                            @for($i=1;$i<=$student_course->course->writing_tests;$i++)
                                                            
                                                            <td style="cursor:pointer;">W{{$i}}</td>
                                                           
                                                            @endfor
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>Score</td>
                                                            <?php $count = 0;$flag=0; $w_total = 0;?>
                                                            @for($i=1;$i<=$student_course->course->writing_tests;$i++)
                                                                @if($student->wes->where('session','W'.$i)->where('task',1)->where('test_type',2)->pluck('id')->first())
                                                                    <?php $count++;$w_total+= $student->wes->where('session','W'.$i)->where('task',1)->where('test_type',2)->pluck('total_score')->first();?>
                                                                    <td style="cursor:pointer;" onclick="show_session_info(3,{{$student->wes->where('session','W'.$i)->where('task',1)->where('test_type',2)->pluck('id')->first()}});">{{$student->wes->where('session','W'.$i)->where('task',1)->where('test_type',2)->pluck('total_score')->first()}}</td>
                                                                @else
                                                                    <td></td>
                                                                @endif
                                                            @endfor
                                                        </tr>
                                                        <tr>
                                                           
                                                            <?php if($w_total > 0 ) { $o = ($w_total)/$count; $f = $o - (int)$o;  if($f >= 0.00 && $f < 0.25){$o = (int)$o+0.0;}elseif($f >=0.25 && $f<=0.50 ){$o = (int)$o+0.5;}elseif($f >0.50 && $f<=0.99 ){$o+=1;$o = (int)$o+0.0;} $w_overall_score = $o;}else{$w_overall_score = 0;} ?>   
                                                           
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student_course->course->writing_tests_2 > 0)
                                        <div class="card bg-light mb-3" id="mock_3_2">
                                            <div class="card-header feedback-header" >Writing Test (Task 2)</div>
                                            <div class="card-body"  style="overflow-x:scroll;">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Practice Name</td>
                                                            @for($i=1;$i<=$student_course->course->writing_tests_2;$i++)
                                                            
                                                            <td style="cursor:pointer;">W{{$i}}</td>
                                                           
                                                            @endfor
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>Score</td>
                                                            <?php $count = 0; $w2_total = 0;?>
                                                            @for($i=1;$i<=$student_course->course->writing_tests_2;$i++)
                                                                @if($student->wes->where('session','W'.$i)->where('task',2)->where('test_type',2)->pluck('id')->first())
                                                                    <?php $count++;$w2_total+= $student->wes->where('session','W'.$i)->where('task',2)->where('test_type',2)->pluck('total_score')->first();?>
                                                                    <td style="cursor:pointer;" onclick="show_session_info(3,{{$student->wes->where('session','W'.$i)->where('task',2)->where('test_type',2)->pluck('id')->first()}});">{{$student->wes->where('session','W'.$i)->where('task',2)->where('test_type',2)->pluck('total_score')->first()}}</td>
                                                                @else
                                                                    <td></td>
                                                                @endif
                                                            @endfor
                                                        </tr>
                                                        <tr>
                                                           
                                                            <?php if($w2_total > 0 ) { $o = ($w2_total)/$count; $f = $o - (int)$o;  if($f >= 0.00 && $f < 0.25){$o = (int)$o+0.0;}elseif($f >=0.25 && $f<=0.50 ){$o = (int)$o+0.5;}elseif($f >0.50 && $f<=0.99 ){$o+=1;$o = (int)$o+0.0;} $w2_overall_score = $o;}else{$w2_overall_score = 0;} ?>   
                                                             
                                                        
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student_course->course->speaking_tests > 0)
                                        <div class="card bg-light mb-3" id="mock_4">
                                            <div class="card-header feedback-header" >Speaking</div>
                                            <div class="card-body" style="overflow-x:scroll;">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Practice Name</td>
                                                            @for($i=1;$i<=$student_course->course->speaking_tests;$i++)
                                                            
                                                            <td style="cursor:pointer;">S{{$i}}</td>
                                                           
                                                            @endfor
                                                        </tr>
                                                        <tr>
                                                            <td>Score</td>
                                                            <?php $count = 0; $s_total = 0;?>
                                                            @for($i=1;$i<=$student_course->course->speaking_tests;$i++)
                                                                @if($student->ses->where('session','S'.$i)->where('test_type',2)->pluck('id')->first())
                                                                    <?php $count++;$s_total+= $student->ses->where('session','S'.$i)->where('test_type',2)->pluck('total_score')->first();?>
                                                                    <td style="cursor:pointer;" onclick="show_session_info(4,{{$student->ses->where('session','S'.$i)->where('test_type',2)->pluck('id')->first()}});">{{$student->ses->where('session','S'.$i)->where('test_type',2)->pluck('total_score')->first()}}</td>
                                                                @else
                                                                    <td></td>
                                                                @endif
                                                            @endfor
                                                        </tr>
                                                        <tr>
                                                          
                                                            <?php if($s_total > 0 ) { $o = ($s_total)/$count; $f = $o - (int)$o;  if($f >= 0.00 && $f < 0.25){$o = (int)$o+0.0;}elseif($f >=0.25 && $f<=0.50 ){$o = (int)$o+0.5;}elseif($f >0.50 && $f<=0.99 ){$o+=1;$o = (int)$o+0.0;} $s_overall_score = $o;}else{$s_overall_score = 0;} ?>   
                                                           
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" style="margin-top:10px;">
                                <div class="card">
                                    <div class="card-header white">
                                        <strong> Overall Score</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php $over_all_score = 0; $tests =0;?>
                                            @if($student_course->course->listening_tests > 0)
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 5px 15px;">L</span>
                                                    <span class="overview-panel-text"><?php $over_all_score+=$l_overall_score;$tests++; ?>{{$l_overall_score}}</span>
                                                </div>
                                            </div>
                                            @endif 
                                            @if($student_course->course->reading_tests > 0)
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 5px 15px;">R</span>
                                                    <span class="overview-panel-text"><?php $over_all_score+=$r_overall_score;$tests++; ?>{{$r_overall_score}}</span>
                                                </div>
                                            </div> 
                                            @endif
                                            @if($student_course->course->writing_tests > 0)
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 10px;letter-spacing:-3px">W 1</span>
                                                    <span class="overview-panel-text"><?php $over_all_score+=$w_overall_score;$tests++; ?>{{$w_overall_score}}</span>
                                                </div>
                                            </div>
                                            @endif
                                            @if($student_course->course->writing_tests_2 > 0)
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 10px;letter-spacing:-3px">W 2</span>
                                                    <span class="overview-panel-text"><?php $over_all_score+=$w2_overall_score;$tests++; ?>{{$w2_overall_score}}</span>
                                                </div>
                                            </div>
                                            @endif
                                            @if($student_course->course->speaking_tests > 0) 
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 5px 15px;">S</span>
                                                    <span class="overview-panel-text"><?php $over_all_score+=$s_overall_score;$tests++; ?>{{$s_overall_score}}</span>
                                                </div>
                                            </div>  
                                            @endif
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 5px 15px;">T</span>
                                                    <span class="overview-panel-text"><?php $o = ($over_all_score)/$tests; $f = $o - (int)$o;  if($f >= 0.00 && $f < 0.25){$o = (int)$o+0.0;}elseif($f >=0.25 && $f<=0.50 ){$o = (int)$o+0.5;}elseif($f >0.50 && $f<=0.99 ){$o+=1;$o = (int)$o+0.0;} ?>{{number_format($o,1)}}</span>
                                                </div>
                                            </div>  
                                        </div>
                                        
                                    
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                       
                </div>
                <!-- Mock Test Tab data -->
                <div class="tab-pane fade" id="w6-tab4" role="tabpanel" aria-labelledby="w6-tab4">
                        <div class="row p-3">
                            <div class="col-md-12 text-center">
                                <!-- <button class="btn btn-primary mt-1" style="background:#ff7b00;" onclick="show_mock_score();">Mock Test Score</button> -->
                                <button class="btn btn-primary mt-1" style="background:#ff7b00;" onclick="show_test_suggestions();">Test Feedback</button> 
                                <button class="btn btn-primary mt-1" style="background:#ff7b00;" onclick="show_att_suggestions();">Attendance Feedback</button>
                            </div>
                        </div>
                        <div class="row" id="test_suggestion">
                            <div class="col-md-6">
                                @foreach($suggestions[0] as $suggestion)
                                <div class="card bg-light mb-3">
                                    <div class="card-header feedback-header" >{{$suggestion->date}}</div>
                                    <div class="card-body">
                                    
                                        <p class="card-text">{{$suggestion->suggestion}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-md-6" id="">
                                @foreach($suggestions[1] as $suggestion)
                                <div class="card bg-light mb-3">
                                    <div class="card-header feedback-header" >{{$suggestion->date}}</div>
                                    <div class="card-body">
                                    
                                        <p class="card-text">{{$suggestion->suggestion}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row" id="att_suggestion" style="display:none;">
                            <div class="col-md-12">
                                @foreach($att_feedbacks as $suggestion)
                                <div class="card bg-light mb-3">
                                    <div class="card-header feedback-header" >{{$suggestion->date}}</div>
                                    <div class="card-body">
                                    
                                        <p class="card-text">{{$suggestion->feedback}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                          
                        </div>
                </div>
                <div class="tab-pane fade" id="w6-tab5" role="tabpanel" aria-labelledby="w6-tab5">
                       
                        <div class="row" style="padding-top:50px;">
                            <div class="col-md-6 p-5 text-center" style="border:1px solid #efefef;">
                               <img src="{{asset('img/speaking_test.jpg')}}" alt="" style="width:300px;">
                               <h1 style="margin: 20px 0;font-weight:700;color:#000;">Speaking Test</h1>
                               <a href="{{route('student-book-speaking-test-page',['id' => $student->id,'course_id' => $student_course->course->id])}}"><button class="btn btn-xl btn-primary blue" style="font-weight:700;">Book My Test</button></a>
                            </div>
                            <div class="col-md-6 p-5 text-center"  style="border:1px solid #efefef;">
                                <img src="{{asset('img/writing_test.jpg')}}" alt="" style="width:300px;">
                                <h1 style="margin: 20px 0;font-weight:700;color:#000;">Writing Test</h1>
                                <a href="{{route('student-pen-paper',['id' => $student->id,'course_id' => $student_course->course->id])}}"><button class="btn btn-primary" style="font-weight:700;display:block;width:200px;margin:5px auto;background:#ff7b00;">Pen & Paper</button></a>
                                <a href="{{route('student-computer-written-test-selection',['student_id' => $student->id,'course_id' => $student_course->course->id])}}"><button class="btn btn-primary" style="font-weight:700;display:block;width:200px;margin:5px auto;background:#ff7b00;">Computer Test</button></a>
                            </div>
                        </div>
                        
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="test_details_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="max-width:700px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color:#000;">Test Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center" id="test_details_div" style="color:#000;">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Registration options modal -->
<div class="modal" id="student_report_card_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="max-width: 650px;">
    <div class="modal-content" style="border-radius:1rem;">
       <div class="modal-header">
       <h5 class="modal-title">Student Report Card URL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center" >
       
        <div class="form-group " style="text-align:left;">
        <input type="text" class="form-control" id="url_input" value="">
		   <button class="btn btn-success" style="margin-top:10px;" onclick="copy_link();">Copy Link</button>
       </div>
      
     </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>





@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
    $('#user_table').DataTable();
    $('#summernote').summernote({
        height:500
    });
    $('#summernote_2').summernote({
        height:400
    });
} );

function sort_attendance()
{
    var date = $('#attendance_date').val();
    var session = $('#attendance_session').val();
    $.ajax({
                type:'GET',
                url:"{{route('attendance-sort')}}",
                data:{'student_id':{{$student->id}},'date':date,'session':session},
                success:function(data){
                   $('#attendance_div').html(data);
                    
                }
		    });
}
function show_session_info(type,test_id)
{
    $.ajax({
                type:'GET',
                url:"{{route('student-test-details')}}",
                data:{'type':type,'test_id':test_id},
                success:function(data){
                   $('#test_details_div').html(data);
                    $('#test_details_modal').modal('show');
                }
		    });
}
function show_hide_practice_results()
{
    var value = $('#practice_filter').val();
    console.log(value);
    hide_all_practice();
    if(value == 0)
    {
        $('#practice_1').css('display','block');
        $('#practice_2').css('display','block');
        $('#practice_3_1').css('display','block');
        $('#practice_3_2').css('display','block');
        $('#practice_4').css('display','block');
    }
    if(value == 1)
    $('#practice_1').css('display','block');
    else if(value == 2)
    $('#practice_2').css('display','block');
    else if(value == 3)
    {
        $('#practice_3_1').css('display','block');
        $('#practice_3_2').css('display','block');
    }
    else if(value == 4)
    $('#practice_4').css('display','block');
}
function hide_all_practice()
{
    $('#practice_1').css('display','none');
    $('#practice_2').css('display','none');
    $('#practice_3_1').css('display','none');
    $('#practice_3_2').css('display','block');
    $('#practice_4').css('display','none');
}
function show_hide_mock_results()
{
    var value = $('#mock_filter').val();
    console.log(value);
    hide_all_mock();
    if(value == 0)
    {
        $('#mock_1').css('display','block');
        $('#mock_2').css('display','block');
        $('#mock_3_1').css('display','block');
        $('#mock_3_2').css('display','block');
        $('#mock_4').css('display','block');
    }
    if(value == 1)
    $('#mock_1').css('display','block');
    else if(value == 2)
    $('#mock_2').css('display','block');
    else if(value == 3)
    {
        $('#mock_3_1').css('display','block');
        $('#mock_3_2').css('display','block');
    }
    
    else if(value == 4)
    $('#mock_4').css('display','block');
}
function hide_all_mock()
{
    $('#mock_1').css('display','none');
    $('#mock_2').css('display','none');
    $('#mock_3_1').css('display','none');
    $('#mock_3_2').css('display','block');
    $('#mock_4').css('display','none');
}
function show_report_card_url()
{
    var id = "{{$student->id}}";
    var course_id = "{{$student_course->course->id}}";
    var base_url = "{{url('/')}}";
    var url = base_url + "/student-report-card/"+id+"/"+course_id;
    $('#url_input').val(url);
    $('#student_report_card_modal').modal('show');
    console.log(url);
}
function copy_link(){
		var copyText = document.getElementById("url_input");

		  /* Select the text field */
		  copyText.select();
		  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

		  /* Copy the text inside the text field */
		  document.execCommand("copy");
}
function show_attendance_record()
{
    $('#attendance_record').css('display','flex');
    $('#attendance_feedback').css('display','none');
}
function show_attendance_feedback()
{
    $('#attendance_record').css('display','none');
    $('#attendance_feedback').css('display','block');
}
function show_practice_score()
{
    $('#practice_score').css('display','flex');
    $('#mock_score').css('display','none');
   
}
function show_test_suggestions()
{
    
    $('#att_suggestion').css('display','none');
    $('#test_suggestion').css('display','block');
}
function show_mock_score()
{
    $('#practice_score').css('display','none');
    $('#mock_score').css('display','flex');
    
}
function show_att_suggestions()
{
    $('#test_suggestion').css('display','none');
    $('#att_suggestion').css('display','block');
}
</script>
@endsection