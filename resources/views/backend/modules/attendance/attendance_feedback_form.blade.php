<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/basic/favicon.ico')}}" type="image/x-icon">
    <title>Student Attendance Feedback Form</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
</head>
<body class="light">
@if(Session::has('saved_success'))
<div class="toast"
    data-title="Success!"
    data-message="Student Attendance Feedback Saved Successfully."
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
        <h1 class="page-title">Student Attendance Feedback</h1>
       
    </div>
    <div class="banner-overlay"></div>
</div>
    <div id="primary" class="p-t-b-50 height-full" style="background:#fff;padding:0 10px;">
        <div class="container" style="background:#f3f5f8;border-radius:10px;padding:20px 0;">
            <div class="row">
                <div class="col-lg-6 mx-md-auto" style="color:#000;">
                    <div class="text-center">
                        <img src="{{asset('img/ielts_master_logo.jpeg')}}" style="width:120px;margin:10px auto 30px auto;" alt="" style="">
                        <h1 class="mt-2" style="color:#000;font-weight:600;">Student Attendance Feedback Form</h1>    
                    </div>
                    <form action="{{route('attendance-feedback-form-save')}}" method="POST" enctype="multipart/form-data" style="padding:50px;">
                        
                        
                        <div class="row" id="students_div">
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
                                    <div class="label">Tutor name:</div>
                                    <input type="text" name="tutor_name" id="tutor_name" class="form-control" >
                                    </div>
                            </div>
                            <div class="col-md-12" id="student_div_1">
                                <div class="form-group">
                                    <div class="label">Student:</div>
                                    <select name="student_id_1" id="student_id_1" class="form-control select2">
                                       <option value="0">Choose Student</option>
                                       @foreach($students as $student)
                                            <option value="{{$student->id}}">ID: {{$student->id}} | {{$student->first_name}} {{$student->last_name}} | {{Carbon\Carbon::parse($student->admission_date)->format('M Y')}} | {{$student->location}}</option>
                                        @endforeach
                                    </select>
                                   
                                    
                                </div>
                            </div>
                           
                            <div class="col-md-12" id="student_feedback_div_1">
                                <div class="form-group">
                                    <div class="label">Feedback:</div>
                                    <textarea name="feedback_1" id="feedback_1" class="form-control" rows="5"></textarea>
                                   
                                    <button type="button" class="btn btn-secondary" id="add_button_1" onclick="add_student(1)" style="margin-top:10px;"><i class="icon-plus"></i></button>
                                </div>
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
            <div class="col-md-12" id="student_div_`+count+`">
                <div class="form-group">
                    <div class="label">Student:</div>
                    <select name="student_id_`+count+`" id="student_id_`+count+`" class="form-control select2">
                        <option value="0">Choose Student</option>
                        @foreach($students as $student)
                            <option value="{{$student->id}}">ID: {{$student->id}} | {{$student->first_name}} {{$student->last_name}} | {{Carbon\Carbon::parse($student->admission_date)->format('M Y')}} | {{$student->location}}</option>
                        @endforeach
                    </select>
                    
                    
                </div>
            </div>
            <div class="col-md-12" id="student_feedback_div_`+count+`">
                <div class="form-group">
                    <div class="label">Feedback:</div>
                    <textarea name="feedback_`+count+`" id="feedback_`+count+`" class="form-control" rows="5"></textarea>
                    
                    <button type="button" class="btn btn-secondary" id="add_button_`+count+`" onclick="add_student(`+count+`)" style="margin-top:10px;"><i class="icon-plus"></i></button>
                    <button type="button" class="btn btn-danger" id="remove_button_`+count+`" onclick="remove_student(`+count+`)" style="margin-top:10px;"><i class="icon-minus"></i></button>
                </div>
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
        $('#student_feedback_div_'+count).remove();
    }
</script>
</body>
</html>