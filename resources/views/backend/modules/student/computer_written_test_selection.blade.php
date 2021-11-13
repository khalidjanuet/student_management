<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/basic/favicon.ico')}}" type="image/x-icon">
    <title>Student Report Card</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        
        .fam_test {
            width: 100%;
            float: left;
            position: relative;
            margin-top: 20px;
            margin-bottom: 20px;
            background: rgb(227, 24, 55);
            background: linear-gradient(
        122deg
        , rgba(227, 24, 55, 1) 28%, rgba(227, 62, 24, 1) 90%);
            border-radius: 5px;
            box-shadow: 0px 20px 42px rgb(173 173 173 / 57%);
            -webkit-transition: all .4s ease;
            -moz-transition: all .4s ease;
            -ms-transition: all .4s ease;
            -o-transition: all .4s ease;
            transition: all .4s ease;
        }
        .fam_test_bx {
            padding: 25px 25px 5px 25px;
        }
        .fam_test h3 {
            font-size: 26px;
            font-family: 'Poppins';
            font-weight:600;
            margin-bottom: 6px;
            color: #fff;
        }
        .fam_test p {
            font-family: 'Poppins';
            font-weight:400;
            font-size: 14px;
            margin-bottom: 12px;
            line-height: 20px;
            margin-top: 0;
            color: #fff;
            vertical-align: baseline;
       
        }
        .fam_links {
            background-color: rgb(45, 57, 65);
            padding: 10px 8px;
            border-radius: 4px;
            margin: 0 15px 20px 15px;
        }
        .div_center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .line a {
            z-index: 2;
            position: relative;
            color: #e31837 !important;
            font-family: 'Poppins';
            font-weight:500;
            padding-bottom: 2px;
            display: inline-block;
            background-color: transparent !important;
        }
        .fam_links a {
            color: #fff !important;
            font-weight: normal;
            font-size: 12px;
            vertical-align: middle;
            padding-bottom: 0;
            border-right: 1px solid #fff;
            padding: 0 25px;
            font-family: 'Poppins';
            font-weight:500;
        }
        .fam_links a:last-child {
            border-right: none;
            padding-right: 0px;
        }
        .fam_links a img {
            width: 15px;
            vertical-align: middle;
            margin-right: 6px;
        }
        
    </style>
    
</head>
<body class="light">

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
    <div class="container">
    <div class="col-sm-6 col-xs" style="margin:10% auto 0 auto">
                <div class="fam_test line">
                    <div class="fam_test_bx">
                        <form action="{{route('student-computer-written-test-selected')}}" method="post">
                            <h3>Writing Test Selection Page:</h3>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="label">Test Type:</div>
                                    <select class="form-control select2" name="type" id="test_type" onchange="get_modules()" required>
                                        <option value="0">Select Type</option>
                                        <option value="1">Practice</option>
                                        <option value="2">Mock</option>
                                    </select>
                                    @if($errors->first('type'))
                                        <p class="text-danger">{{$errors->first('type')}}</p>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group" id="session_div">
                                    <div class="label">Modules:</div>
                                    <select class="form-control select2" name="session_id" id="session_id" required>
                                        <option value="0">Select Module</option>
                                        
                                    </select>
                                    @if($errors->first('session'))
                                        <p class="text-danger">{{$errors->first('session')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-center">
                                @csrf
                                <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                <input type="hidden" name="student_id" id="student_id" value="{{$student->id}}">
                                <button class="btn btn-success btn-sm">Submit & Start Test</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
    </div>
</div>
<!--/#app -->
<script src="{{asset('js/app.js')}}"></script>
<script>
function get_modules()
{
    var course_id = $('#course_id').val();
    var student_id = $('#student_id').val();
    var test_type = $('#test_type').val();
    $.ajax({
                type:'GET',
                url:"{{route('test-selection-course-sessions-ajax')}}",
                data:{'student_id':student_id,'course_id':course_id,'test_type':test_type},
                success:function(data){
                   $('#session_div').html(data);
                   $('#session_id').select2();
                    
                }
		    });
}
</script>
</body>
</html>