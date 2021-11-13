<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/basic/favicon.ico')}}" type="image/x-icon">
    <title>Reading Evaluation Form</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
</head>
<body class="light">
@if(Session::has('saved_success'))
<div class="toast"
    data-title="Success!"
    data-message="Evaluation Data Saved Successfully."
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
        <h1 class="page-title">Reading Evaluation</h1>
       
    </div>
    <div class="banner-overlay"></div>
</div>

    <div id="primary" class="p-t-b-50 height-full" style="background:#fff;padding:0 10px;">
        <div class="container" style="background:#f3f5f8;border-radius:10px;padding:20px 0;">
            <div class="row">
                <div class="col-lg-12 mx-md-auto" style="color:#000;">
                    <div class="text-center">
                        <img src="{{asset('img/ielts_master_logo.jpeg')}}" style="width:120px;margin:10px auto 30px auto;" alt="" style="">
                        <h1 class="mt-2" style="color:#000;font-weight:600;">IELTS MASTER READING EVALUATION FORM</h1>    
                    </div>
                    <form action="{{route('reading-evaluation-save')}}" method="POST" enctype="multipart/form-data" style="padding:50px;">
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Student Name:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <select name="student_id_name" id="student_id_name" class=" form-control select2" onchange="change_student_id()" required>
                                       <option value="0">Choose Student</option>
                                        @foreach($students as $student)
                                            <option value="{{$student->id}}">ID: {{$student->id}} | {{$student->first_name}} {{$student->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>                       
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Student ID:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="student_id" name="student_id" readonly="true" value="{{old('student_id')}}" required>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Test Type:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                    <select name="test_type" id="test_type" class="form-control" onchange="change_student_id()" required>
                                        <option value="1">Practice</option>
                                        <option value="2">Mock Test</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Reading Practice Number:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control select2" name="session" required id="session">
                                        <option value="">Select Practice Number</option>
                                       
                                    </select>
                                </div>
                            </div>
                        </div>
                       
                        
                        {{--<div class="row">
                            <div class="col-md-3">
                                <h5>Problems:</h5>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <textarea class="form-control" name="problems" id="" cols="30" rows="5">{{old('problems')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Suggestions:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <textarea class="form-control" name="suggestions" id="" cols="30" rows="5" required>{{old('suggestions')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Fluency & Cohesion:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                    <select name="fluency_cohesion" id="" class="form-control">
                                        <option value="0">Absent</option>
                                        <option value="3">Band 3</option>
                                        <option value="3.5">Band 3.5</option>
                                        <option value="4">Band 4</option>
                                        <option value="4.5">Band 4.5</option>
                                        <option value="5">Band 5</option>
                                        <option value="5.5">Band 5.5</option>
                                        <option value="6">Band 6</option>
                                        <option value="6.5">Band 6.5</option>
                                        <option value="7">Band 7</option>
                                        <option value="7.5">Band 7.5</option>
                                        <option value="8">Band 8</option>
                                        <option value="8.5">Band 8.5</option>
                                        <option value="9">Band 9</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Pronunciation:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                    <select name="pronunciation" id="" class="form-control" >
                                    <option value="0">Absent</option>
                                        <option value="3">Band 3</option>
                                        <option value="3.5">Band 3.5</option>
                                        <option value="4">Band 4</option>
                                        <option value="4.5">Band 4.5</option>
                                        <option value="5">Band 5</option>
                                        <option value="5.5">Band 5.5</option>
                                        <option value="6">Band 6</option>
                                        <option value="6.5">Band 6.5</option>
                                        <option value="7">Band 7</option>
                                        <option value="7.5">Band 7.5</option>
                                        <option value="8">Band 8</option>
                                        <option value="8.5">Band 8.5</option>
                                        <option value="9">Band 9</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Grammatical Range and Accuracy:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="grammatical_range_and_accuracy" id="" class="form-control" >
                                    <option value="0">Absent</option>
                                        <option value="3">Band 3</option>
                                        <option value="3.5">Band 3.5</option>
                                        <option value="4">Band 4</option>
                                        <option value="4.5">Band 4.5</option>
                                        <option value="5">Band 5</option>
                                        <option value="5.5">Band 5.5</option>
                                        <option value="6">Band 6</option>
                                        <option value="6.5">Band 6.5</option>
                                        <option value="7">Band 7</option>
                                        <option value="7.5">Band 7.5</option>
                                        <option value="8">Band 8</option>
                                        <option value="8.5">Band 8.5</option>
                                        <option value="9">Band 9</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Lexical Resource:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="lexical_resource" id="" class="form-control" >
                                    <option value="0">Absent</option>
                                        <option value="3">Band 3</option>
                                        <option value="3.5">Band 3.5</option>
                                        <option value="4">Band 4</option>
                                        <option value="4.5">Band 4.5</option>
                                        <option value="5">Band 5</option>
                                        <option value="5.5">Band 5.5</option>
                                        <option value="6">Band 6</option>
                                        <option value="6.5">Band 6.5</option>
                                        <option value="7">Band 7</option>
                                        <option value="7.5">Band 7.5</option>
                                        <option value="8">Band 8</option>
                                        <option value="8.5">Band 8.5</option>
                                        <option value="9">Band 9</option>
                                    </select>
                                </div>
                            </div>
                        </div>--}}
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Total Score:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <select name="total_score" id="" class="form-control" required>
                                <option value="0">Absent</option>
                                        <option value="3">Band 3</option>
                                        <option value="3.5">Band 3.5</option>
                                        <option value="4">Band 4</option>
                                        <option value="4.5">Band 4.5</option>
                                        <option value="5">Band 5</option>
                                        <option value="5.5">Band 5.5</option>
                                        <option value="6">Band 6</option>
                                        <option value="6.5">Band 6.5</option>
                                        <option value="7">Band 7</option>
                                        <option value="7.5">Band 7.5</option>
                                        <option value="8">Band 8</option>
                                        <option value="8.5">Band 8.5</option>
                                        <option value="9">Band 9</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Tutor Name:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="tutor_name" value="{{old('tutor_name')}}" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-8">
                                {{csrf_field()}}
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

<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->

</div>
<!--/#app -->
<script src="{{asset('js/app.js')}}"></script>
<script>
    function change_student_id()
    {
        var student = $('#student_id_name').val();
        $('#student_id').val(student);
        $.ajax({
                type:'GET',
                url:"{{route('student-course-session-details-ajax')}}",
                data:{'student_id':student,'type':2,'test_type': $('#test_type').val()},
                success:function(data){
                    $('#session').html(data);
                   
                }
		    });
    }
</script>
</body>
</html>