<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/basic/favicon.ico')}}" type="image/x-icon">
    <title>Student Attendance Form</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
</head>
<body class="light">
@if(Session::has('saved_success'))
<div class="toast"
    data-title="Success!"
    data-message="Student Attendance Saved Successfully."
    data-type="success">
</div>
@endif
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<main>
<div class="content-banner">
    <div class="container">
        <h1 class="page-title">Student Attendance</h1>
       
    </div>
    <div class="banner-overlay"></div>
</div>
    <div id="primary" class="p-t-b-50 height-full" style="background:#fff;padding:0 10px;">
        <div class="container" style="background:#f3f5f8;border-radius:10px;padding:20px 0;">
            <div class="row">
                <div class="col-lg-6 mx-md-auto" style="color:#000;">
                    <div class="text-center">
                        <img src="{{asset('img/ielts_master_logo.jpeg')}}" style="width:120px;margin:10px auto 30px auto;" alt="" style="">
                        <h1 class="mt-2" style="color:#000;font-weight:600;">Student Attendance Form</h1>    
                    </div>
                    <form action="{{route('attendance-form-save')}}" method="POST" enctype="multipart/form-data" style="padding:50px;">
                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="label">Date:</div>
                                    <input type="date" class="form-control" name="date" id="" placeholder="DD/MM/YYYY">
                                    @if($errors->first('date'))
									    <p class="text-danger">{{$errors->first('date')}}</p>
								    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="label">Time:</div>
                                    <input class="form-control" name="time" placeholder="Format: 9 - 10:30 AM">
                                    <!--<select class="form-control" name="time" id="">-->
                                    <!--    <option value="">Select Time</option>-->
                                    <!--    <option value="7AM - 8AM">7AM - 8AM</option>-->
                                    <!--    <option value="8AM - 9AM">8AM - 9AM</option>-->
                                    <!--    <option value="9AM - 10AM">9AM - 10AM</option>-->
                                    <!--    <option value="10AM - 11AM">10AM - 11AM</option>-->
                                    <!--    <option value="11AM - 12PM">11AM - 12PM</option>-->
                                    <!--    <option value="12PM - 1PM">12PM - 1PM</option>-->
                                    <!--    <option value="1PM - 2PM">1PM - 2PM</option>-->
                                    <!--    <option value="2PM - 3PM">2PM - 3PM</option>-->
                                    <!--    <option value="3PM - 4PM">3PM - 4PM</option>-->
                                    <!--    <option value="4PM - 5PM">4PM - 5PM</option>-->
                                    <!--    <option value="5PM - 6PM">5PM - 6PM</option>-->
                                    <!--    <option value="6PM - 7PM">6PM - 7PM</option>-->
                                    <!--    <option value="7PM - 8PM">7PM - 8PM</option>-->
                                    <!--    <option value="8PM - 9PM">8PM - 9PM</option>-->
                                    <!--    <option value="9PM - 10PM">9PM - 10PM</option>-->
                                    <!--    <option value="10PM - 11PM">10PM - 11PM</option>-->
                                    <!--</select>-->
                                    @if($errors->first('time'))
									    <p class="text-danger">{{$errors->first('time')}}</p>
								    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="label">Tutor Name:</div>
                                    <input type="text" class="form-control" name="tutor_name" id="" placeholder="Enter Tutor Name">
                                    @if($errors->first('tutor_name'))
									    <p class="text-danger">{{$errors->first('tutor_name')}}</p>
								    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="label">Module:</div>
                                    <select class="form-control select2" name="session" id="">
                                        <option value="0"> Select Module</option>
                                        @foreach($sessions as $session)
                                            <option value="{{$session->name}}">{{$session->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->first('session'))
									    <p class="text-danger">{{$errors->first('session')}}</p>
								    @endif
                                </div>
                            </div>
                            <div class="col-md-12" id="students_div">
                                <div class="form-group" id="student_div_1">
                                    <div class="label">Student:</div>
                                    <select name="student_id_1" id="student_id_1" class="form-control select2">
                                       <option value="0">Choose Student</option>
                                        @foreach($students as $student)
                                            <option value="{{$student->id}}">ID: {{$student->id}} | {{$student->first_name}} {{$student->last_name}} | {{Carbon\Carbon::parse($student->admission_date)->format('M Y')}} | {{$student->location}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->first('student_id'))
									    <p class="text-danger">{{$errors->first('student_id')}}</p>
								    @endif
                                    
                                    <div class="label" style="margin-top:10px;">Comment:</div>
                                    <input type="text" name="comment_1" id="comment_1" class="form-control">
                                   
                                    <button type="button" class="btn btn-secondary" id="add_button_1" onclick="add_student(1)" style="margin-top:10px;"><i class="icon-plus"></i></button>
                                </div>
                            </div>
                            <div class="col-md-12" id="comments_div">
                                
                            </div>
                            
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-12 text-center">
                                {{csrf_field()}}
                                <input type="hidden" name="students" id="students" value="1">
                                <input type="submit" class="btn btn-success btn-lg btn-block" value="Submit" style="background:#0C6B59;width:300px;margin:10px auto;">
                            </div>
                        </div>
                        
    
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>

<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->

</div>
<!--/#app -->
<script src="{{asset('js/app.js')}}"></script>
<script>
     function add_student(count)
    {
        //first make the previous div add and remove button hide
        $('#add_button_'+count).css('display','none');
        $('#remove_button_'+count).css('display','none');
        count++;
        $('#students').val(count);
        $('#students_div').append(`
            <div class="form-group" id="student_div_`+count+`">
                <div class="label">Student:</div>
                <select name="student_id_`+count+`" id="student_id_`+count+`" class="form-control select2">
                    <option value="0">Choose Student</option>
                    @foreach($students as $student)
                        <option value="{{$student->id}}">ID: {{$student->id}} | {{$student->first_name}} {{$student->last_name}} | {{Carbon\Carbon::parse($student->admission_date)->format('M Y')}} | {{$student->location}}</option>
                    @endforeach
                </select>

                <div class="label" style="margin-top:10px;">Comment:</div>
                <input type="text" name="comment_`+count+`" id="comment_`+count+`" class="form-control">
                <button type="button" class="btn btn-secondary" id="add_button_`+count+`" onclick="add_student(`+count+`)" style="margin-top:10px;"><i class="icon-plus"></i></button>
                <button type="button" class="btn btn-danger" id="remove_button_`+count+`" onclick="remove_student(`+count+`)" style="margin-top:10px;"><i class="icon-minus"></i></button>
            </div>
        `);
        $('#student_id_'+count).select2();
    }
    function remove_student(count)
    {
        var previous = count -1;
        $('#add_button_'+previous).css('display','inline-block');
        $('#remove_button_'+previous).css('display','inline-block');
        $('#students').val(previous);
        $('#student_div_'+count).remove();
    }
</script>
</body>
</html>