<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/basic/favicon.ico')}}" type="image/x-icon">
    <title>Writing Test Pen & Paper</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
</head>
<body class="light">
@if(Session::has('saved_success'))
<div class="toast"
    data-title="Success!"
    data-message="Test Submitted Successfully."
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
        <h1 class="page-title">Written Test Pen And Paper</h1>
       
    </div>
    <div class="banner-overlay"></div>
</div>

    <div id="primary" class="p-t-b-50 height-full" style="background:#fff;padding:0 10px;">
        <div class="container" style="background:#f3f5f8;border-radius:10px;padding:20px 0;">
            <div class="row">
                <div class="col-lg-12 mx-md-auto" style="color:#000;">
                    <div class="text-center">
                        <img src="{{asset('img/ielts_master_logo.jpeg')}}" style="width:120px;margin:10px auto 30px auto;" alt="" style="">
                        <h1 class="mt-2" style="color:#000;font-weight:600;">IELTS MASTER WRITTEN TEST PEN AND PAPER</h1>    
                    </div>
                    <form action="{{route('writing-pen-paper-save')}}" method="POST" enctype="multipart/form-data" style="padding:50px;">
                        
                       
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Student ID:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="student_id" name="student_id" value="{{$student->id}}" readonly="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Tasks:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                    <select name="task" id="task" class="form-control" required >
                                        <option value="">Select Task</option>
                                        <option value="1">Task 1</option>
                                        <option value="2">Task 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Test Type:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                    <select name="test_type" id="test_type" class="form-control" onchange="get_sessions()" required>
                                        <option value="">Select Test Type</option>
                                        <option value="1">Practice</option>
                                        <option value="2">Mock Test</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Question Number:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control select2" name="session" required id="session" onchange="get_question()">
                                        <option value="">Select Module Number</option>
                                       
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Question:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" id="question_div">
                                   
                                </div>
                            </div>
                        </div>
                       
                        <!-- <div class="row">
                            <div class="col-md-3">
                                <h5>Select Tutor:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control select2" name="tutor_id" required>
                                        <option value=""> Select Tutor</option>
                                        @foreach($tutors as $tutor)
                                            <option value="{{$tutor->id}}">{{$tutor->name}}</option>        
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Solved Answer Sheet:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="answer_sheet" required>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-8">
                                {{csrf_field()}}
                                <input type="hidden" name="course_id" value="{{$course_id}}">
                                <input type="submit" class="btn btn-success btn-lg btn-block" value="Submit Form" style="background:#0C6B59;width:200px;margin:10px 0;">
                            </div>
                        </div>
                        
    
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>

</div>
<!--/#app -->

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/app2.js')}}"></script>
<script>
    var course_id = "{{$course_id}}";
  function get_sessions()
  {
        var student = $('#student_id').val();
        $.ajax({
                type:'GET',
                url:"{{route('student-course-session-details-for-pen-paper-ajax')}}",
                data:{'course_id':course_id,'student_id':student,'type':4,'task':$('#task').val(),'test_type': $('#test_type').val()},
                success:function(data){
                    $('#session').html(data);
                   
                }
		    });
  }
  function get_question()
  {
      var student = $('#student_id').val();
        $.ajax({
                type:'GET',
                url:"{{route('student-pen-paper-question')}}",
                data:{'course_id':course_id,'student_id':student,'task':$('#task').val(),'test_type': $('#test_type').val(),'session':$('#session').val()},
                success:function(data){
                    $('#question_div').html(data);
                }
		    });
  }
</script>
</body>
</html>