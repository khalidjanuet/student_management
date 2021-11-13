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
        h4{
            font-weight: 700;
    color: #fff;
    text-align: center;
        }
        
    </style>
    
</head>
<body class="light">
@if(Session::has('booking_success'))
<div class="toast"
    data-title="Success!"
    data-message="Duration Booked Successfully."
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
    <div class="container"  style="margin:10% auto 0 auto;">
    <a href="{{route('student-detail',['id' => $student->id,'course_id' => $course->id] )}}"><button class="btn btn-primary">Back To Details</button></a>
        <div style="padding:5px 20px; border:1px solid #505050;float:right;">
                Test Number: {{$tests}} / {{$course->speaking_tests}}
        </div>
        <div class="row">
            
            @foreach($channels as $channel)
            <div class="col-md-4">
                <div class="fam_test line">
                    <div class="fam_test_bx">
                        <form action="{{route('book-speaking-test-duration')}}" method="post">
                            <div class="form-group">
                                <h4>Zoom Channel {{$channel->id}}</h4>
                            </div>
                            <div class="form-group">
                                <label style="color:#fff;" for="">Days:</label>
                                <select name="day_id" id="day_id_{{$channel->id}}" class="form-control select2" onchange="get_day_durations({{$channel->id}})">
                                    <option value=""> Select Day</option>
                                    @foreach($channel->days as $day)
                                            <option value="{{$day->id}}">{{Carbon\Carbon::parse($day->day)->format('d F Y')}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" id="durations_div_{{$channel->id}}">
                                <label style="color:#fff;" for="">Durations:</label>
                                <select name="duration_id" id="duration_id" class="form-control select2">
                                    <option value=""> Select Duration</option>
                                    
                                </select>
                            </div>
                            <div class="form-group text-center">
                                @csrf
                                <input type="hidden" name="student_id" value="{{$student->id}}">
                                <input type="hidden" name="course_id" value="{{$course->id}}">
                                <button class="btn btn-sm btn-success" style="font-weight:700;display:block;width:200px;margin:5px auto;background:#ff7b00;">Book</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
            @endforeach
        </div>
            
    </div>
</div>
<!--/#app -->
<script src="{{asset('js/app.js')}}"></script>
<script>
function get_day_durations(id)
{
    day_id = $('#day_id_'+id).val();
    console.log(day_id);
    $.ajax({
                type:'GET',
                url:"{{route('get-day-durations-ajax')}}",
                data:{'day_id':day_id},
                success:function(data){
                   $('#durations_div_'+id).html(data);
                   $('#duration_id_'+id).select2();
                }
		    });
}
</script>
</body>
</html>