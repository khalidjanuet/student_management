@extends('backend.layouts.master')
@section('title', 'Student Details')
@section('page_title','Student Details')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card no-b">
        <div class="card-header">
            
            <div class="d-flex justify-content-between">
                <div class="align-self-end">
                    <ul class="nav nav-material nav-material-white card-header-tabs" role="tablist">
                        <li class="nav-item green">
                            <a class="nav-link active show" id="w6--tab1" data-toggle="tab" href="#w6-tab1" role="tab" aria-controls="tab1" aria-expanded="true" aria-selected="true">Overview</a>
                        </li>
                        <li class="nav-item blue">
                            <a class="nav-link" id="w6--tab2" data-toggle="tab" href="#w6-tab2" role="tab" aria-controls="tab2" aria-selected="false">Attendance</a>
                        </li>
                        <li class="nav-item red">
                            <a class="nav-link" id="w6--tab3" data-toggle="tab" href="#w6-tab3" role="tab" aria-controls="tab3" aria-selected="false">Practice Set</a>
                        </li>
                        <li class="nav-item yellow">
                            <a class="nav-link" id="w6--tab4" data-toggle="tab" href="#w6-tab4" role="tab" aria-controls="tab4" aria-selected="false">Mock Test</a>
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
                        
                        <div class="col-md-6" style="margin-top:10px;">
                            <div class="card">
                                <div class="card-header white">
                                    <strong> My Information</strong>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="image m-3">
                                                <img src="{{asset('img/student')}}/{{$student->image}}" alt="" width="100" height="100">
                                            </div>
                                            <div>
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <table class="table">

                                            <tbody> 
                                          
                                            <tr>
                                                <td style="width:250px;border:none;">Name</td>
                                                <td style="border:none;">{{$student->name}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Email</td>
                                                <td style="border:none;">{{$student->email}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Father Name</td>
                                                <td style="border:none;">{{$student->father_name}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Mother Email</td>
                                                <td style="border:none;">{{$student->mother_name}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Father Occupation</td>
                                                <td style="border:none;">{{$student->father_occupation}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Gender</td>
                                                <td style="border:none;">{{$student->gender == 1 ? 'Male' : 'Female'}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Religion</td>
                                                <td style="border:none;">{{$student->religion}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Date of Birth</td>
                                                <td style="border:none;">{{Carbon\Carbon::parse($student->dob)->format('d-m-Y')}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Admission Date</td>
                                                <td style="border:none;">{{Carbon\Carbon::parse($student->admission_date)->format('d-m-Y')}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Class</td>
                                                <td style="border:none;">{{$student->class->title}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Section</td>
                                                <td style="border:none;">{{$student->section->title}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Roll Number</td>
                                                <td style="border:none;">{{$student->roll_no}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Address</td>
                                                <td style="border:none;">{{$student->address}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:250px;border:none;">Phone</td>
                                                <td style="border:none;">{{$student->phone}}</td>
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
                        <div class="col-md-6" style="margin-top:10px;">
                            <div class="card">
                                <div class="card-header white">
                                    <strong> Attendance Overview</strong>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class=" text-center p-5" style="background:#efefef;margin-top:20px;">
                                                <span class="overview-panel-icon">L</span>
                                                <span class="overview-panel-text">3/10</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class=" text-center p-5" style="background:#efefef;margin-top:20px;">
                                                <span class="overview-panel-icon">R</span>
                                                <span class="overview-panel-text">3/10</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class=" text-center p-5" style="background:#efefef;margin-top:20px;">
                                                <span class="overview-panel-icon">S</span>
                                                <span class="overview-panel-text">3/10</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class=" text-center p-5" style="background:#efefef;margin-top:20px;">
                                                <span class="overview-panel-icon" style="padding: 15px 22px;">W</span>
                                                <span class="overview-panel-text">3/10</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-5">
                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-xl btn-primary">Copy Report Card URL</button>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- Attendance Tab Data -->
                <div class="tab-pane fade" id="w6-tab2" role="tabpanel" aria-labelledby="w6-tab2">
                    <div class="row p-3">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary mt-1" onclick="show_attendance_record();">Attendance Record</button>
                            <button class="btn btn-primary mt-1" onclick="show_attendance_feedback();">Attendance FeedBack</button>
                        </div>
                    </div>
                    <div class="row" id="attendance_record">
                        
                        <div class="col-md-6" style="margin-top:10px;">
                            <div class="card">
                                <div class="card-header white">
                                    <input type="date" class="form-control" style="display:inline-block;width:200px;margin-top:10px;">
                                    <select name="session" id="" class="form-control" style="display:inline-block;width:150px;margin-top:10px;">
                                        <option value="0"> Select Session</option>
                                        <option value="1">S1</option>
                                        <option value="2">S2</option>
                                        <option value="3">S3</option>
                                    </select>
                                    <button class="btn btn-success" style="display:inline-block;width:120px;">Search</button>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                      
                                        <tbody>
                                            <tr class="attendance-table-row">
                                                <td>Date</td>
                                                <td>Time</td>
                                                <td>Tutor</td>
                                                <td>Session</td>
                                            </tr>
                                            <tr class="attendance-table-row">
                                                <td>10/12/2020</td>
                                                <td>7:00 AM to 8:00 AM</td>
                                                <td>Khalid Jan</td>
                                                <td>S1</td>
                                            </tr>
                                            <tr class="attendance-table-row">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr class="attendance-table-row">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr class="attendance-table-row">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr class="attendance-table-row">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
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
                                                <span class="overview-panel-icon">L</span>
                                                <span class="overview-panel-text">3/10</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class=" text-center p-5" style="background:#efefef;margin-top:20px;">
                                                <span class="overview-panel-icon">R</span>
                                                <span class="overview-panel-text">3/10</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class=" text-center p-5" style="background:#efefef;margin-top:20px;">
                                                <span class="overview-panel-icon">S</span>
                                                <span class="overview-panel-text">3/10</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class=" text-center p-5" style="background:#efefef;margin-top:20px;">
                                                <span class="overview-panel-icon" style="padding: 15px 22px;">W</span>
                                                <span class="overview-panel-text">3/10</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-5">
                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-xl btn-primary">Copy Report Card URL</button>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row" id="attendance_feedback" style="display:none;">
                        <div class="card bg-light mb-3">
                            <div class="card-header feedback-header" >12-10-2020 <span class="feedback-tutor-name">Tutor: Khalid Jan</span></div>
                            <div class="card-body">
                               
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                    the card's content. Some quick example text to build on the card title and make up the bulk of
                                    the card's content. Some quick example text to build on the card title and make up the bulk of
                                    the card's content. Some quick example text to build on the card title and make up the bulk of
                                    the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Practice Test Tab Data -->
                <div class="tab-pane fade" id="w6-tab3" role="tabpanel" aria-labelledby="w6-tab3">
                    <div class="row p-3">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary mt-1" onclick="show_practice_score();">Practice Set Score</button>
                                <button class="btn btn-primary mt-1" onclick="show_practice_suggestions();">Practice Set Suggestions</button>
                            </div>
                        </div>
                        <div class="row" id="practice_score">
                            
                            <div class="col-md-9" style="margin-top:10px;">
                                <div class="card">
                                    <div class="card-header white">
                                        <strong style="line-height:38px;">Practice Set Results</strong>
                                        <select name="session" id="" class="form-control" style="display:inline-block;width:60px;float:right;">
                                            <option value="1">L</option>
                                            <option value="2">R</option>
                                            <option value="3">W</option>
                                            <option value="4">S</option>
                                        </select>
                                       
                                    </div>
                                    <div class="card-body">
                                        <div class="card bg-light mb-3">
                                            <div class="card-header feedback-header" >Listening</div>
                                            <div class="card-body">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Practice Name</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L1</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L2</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L3</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L4</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L5</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L6</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L7</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L8</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L9</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L10</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Score</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card bg-light mb-3">
                                            <div class="card-header feedback-header" >Reading</div>
                                            <div class="card-body">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Practice Name</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R1</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R2</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R3</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R4</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R5</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R6</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R7</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R8</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R9</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R10</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Score</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card bg-light mb-3">
                                            <div class="card-header feedback-header" >Writing</div>
                                            <div class="card-body">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Practice Name</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W1</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W2</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W3</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W4</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W5</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W6</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W7</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W8</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W9</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W10</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Score</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card bg-light mb-3">
                                            <div class="card-header feedback-header" >Speaking</div>
                                            <div class="card-body">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Practice Name</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S1</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S2</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S3</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S4</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S5</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S6</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S7</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S8</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S9</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S10</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Score</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 5px 15px;">L</span>
                                                    <span class="overview-panel-text">5</span>
                                                </div>
                                            </div> 
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 5px 15px;">R</span>
                                                    <span class="overview-panel-text">6</span>
                                                </div>
                                            </div> 
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 5px 12px;">W</span>
                                                    <span class="overview-panel-text">6</span>
                                                </div>
                                            </div> 
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 5px 15px;">S</span>
                                                    <span class="overview-panel-text">8</span>
                                                </div>
                                            </div>  
                                        </div>
                                        
                                    
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row" id="practice_suggestion" style="display:none;">
                            <div class="card bg-light mb-3">
                                <div class="card-header feedback-header" >12-10-2020</div>
                                <div class="card-body">
                                
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                        the card's content. Some quick example text to build on the card title and make up the bulk of
                                        the card's content. Some quick example text to build on the card title and make up the bulk of
                                        the card's content. Some quick example text to build on the card title and make up the bulk of
                                        the card's content.</p>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- Mock Test Tab data -->
                <div class="tab-pane fade" id="w6-tab4" role="tabpanel" aria-labelledby="w6-tab4">
                    <div class="row p-3">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary mt-1" onclick="show_mock_score();">Mock Test Score</button>
                                <button class="btn btn-primary mt-1" onclick="show_mock_suggestions();">Mock Test Suggestions</button>
                            </div>
                        </div>
                        <div class="row" id="mock_score">
                            
                            <div class="col-md-9" style="margin-top:10px;">
                                <div class="card">
                                    <div class="card-header white">
                                        <strong style="line-height:38px;">Mock Test Results</strong>
                                        <select name="session" id="" class="form-control" style="display:inline-block;width:60px;float:right;">
                                            <option value="1">L</option>
                                            <option value="2">R</option>
                                            <option value="3">W</option>
                                            <option value="4">S</option>
                                        </select>
                                       
                                    </div>
                                    <div class="card-body">
                                        <div class="card bg-light mb-3">
                                            <div class="card-header feedback-header" >Listening</div>
                                            <div class="card-body">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Practice Name</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L1</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L2</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L3</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L4</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L5</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L6</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L7</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L8</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L9</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">L10</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Score</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card bg-light mb-3">
                                            <div class="card-header feedback-header" >Reading</div>
                                            <div class="card-body">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Practice Name</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R1</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R2</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R3</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R4</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R5</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R6</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R7</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R8</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R9</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">R10</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Score</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card bg-light mb-3">
                                            <div class="card-header feedback-header" >Writing</div>
                                            <div class="card-body">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Practice Name</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W1</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W2</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W3</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W4</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W5</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W6</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W7</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W8</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W9</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">W10</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Score</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card bg-light mb-3">
                                            <div class="card-header feedback-header" >Speaking</div>
                                            <div class="card-body">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Practice Name</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S1</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S2</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S3</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S4</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S5</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S6</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S7</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S8</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S9</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();">S10</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Score</td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                            <td style="cursor:pointer;" onclick="show_session_info();"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 5px 15px;">L</span>
                                                    <span class="overview-panel-text">5</span>
                                                </div>
                                            </div> 
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 5px 15px;">R</span>
                                                    <span class="overview-panel-text">6</span>
                                                </div>
                                            </div> 
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 5px 12px;">W</span>
                                                    <span class="overview-panel-text">6</span>
                                                </div>
                                            </div> 
                                            <div class="col-md-12">
                                                <div class=" text-center p-3" style="background:#efefef;margin-top:10px;">
                                                    <span class="overview-panel-icon" style="padding: 5px 15px;">S</span>
                                                    <span class="overview-panel-text">8</span>
                                                </div>
                                            </div>  
                                        </div>
                                        
                                    
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row" id="mock_suggestion" style="display:none;">
                            <div class="card bg-light mb-3">
                                <div class="card-header feedback-header" >12-10-2020 </div>
                                <div class="card-body">
                                
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                        the card's content. Some quick example text to build on the card title and make up the bulk of
                                        the card's content. Some quick example text to build on the card title and make up the bulk of
                                        the card's content. Some quick example text to build on the card title and make up the bulk of
                                        the card's content.</p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
<script>
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
    $('#practice_suggestion').css('display','none');
}
function show_practice_suggestions()
{
    $('#practice_score').css('display','none');
    $('#practice_suggestion').css('display','block');
}
function show_mock_score()
{
    $('#mock_score').css('display','flex');
    $('#mock_suggestion').css('display','none');
}
function show_mock_suggestions()
{
    $('#mock_score').css('display','none');
    $('#mock_suggestion').css('display','block');
}
</script>