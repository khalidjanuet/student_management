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
        body{
            background-color: #dbe5f5 !important;
            color:#000 !important;
        }
        .main-content-container {
        border-top: 1px solid transparent;
        background-image: url("{{asset('img/written_test_bg_1.png')}}");
        background-repeat: repeat-x;
        min-height: 500px;
    }
    .banner.black+.main-content-container {
    border-top: 1px solid #000;
}
    .confirm-container, .confirm-finish-container {
    text-align: center;
    width: 760px;
    margin: 60px auto 10px;
}
.confirm-container h1, .confirm-finish-container h1 {
    text-align: left;
    color: #fff;
    padding: 7px 12px 7px 70px;
    font-size: 16px;
    font-weight: 700;
    text-shadow: 0 1px 2px rgb(0 0 0 / 75%);
    margin-bottom: 3px;
    position: relative;
}
.confirm-container h1:before, .confirm-finish-container h1:before {
    content: "";
    display: block;
    position: absolute;
    left: 10px;
    bottom: -6px;
    width: 48px;
    height: 48px;
    background-image: url("{{asset('img/written_test_2_user_icon.png')}}");
    background-size: cover;
    background-repeat: no-repeat;
}
.confirm-container>div, .confirm-finish-container>div {
    padding: 12px;
    border: 1px solid #fff;
    min-height: 150px;
    border-radius: 0 0 12px 12px;
}
.confirm-container>div p, .confirm-finish-container>div p {
    text-align: left;
    font-size: 16px;
    color: #454545;
    margin: 5px 0;
    font-weight: 300;
    letter-spacing: .2px;
    line-height: 30px;
}
p.hint {
    margin: 18px 0!important;
    font-size: 16px;
    padding-left: 25px;
    color: #000!important;
}
p.hint.message {
    background-image: url("{{asset('img/written_test_2.info_icon.png')}}");
    background-repeat: no-repeat;
    background-size: 18px;
    background-position: 0;
}
.confirm-container button, .confirm-finish-container button, .introduction-container button {
    color: #1e415b;
    font-size: 15.4px;
    font-weight: 700;
    margin: 0 auto 16px!important;
    padding: 6px 16px;
    background: transparent;
    text-shadow: 0 1px 1px #fff;
    box-shadow: 0 1px 1px rgb(0 0 0 / 50%);
    border-radius: 5px;
    border: none;
}
.confirm-container button:hover, .confirm-finish-container button:hover, .introduction-container button:hover {
    box-shadow: 0 1px 2px rgb(0 0 0 / 75%);
}
.introduction-container {
    margin: 12px 10px;
    padding: 16px 10px;
    border-radius: 6px;
    background-color: #dde3ee;
    box-shadow: 0 0.0714em 0.214em rgb(0 0 0 / 25%);
}
.introduction-container h1, .introduction-container h2, .introduction-container p, .introduction-container ul {
    margin: 0;
    text-align: left;
}
.introduction-container h1 {
    font-size: 18px;
    font-weight:700;
    color:#000;
}
.introduction-container p:nth-child(2) {
    padding: 20px 0;
    font-size: 14px;
}
.introduction-container h2 {
    padding-bottom: 20px;
    font-size: 16px;
    font-weight:700;
    color:#000;
}
.introduction-container ul {
    padding: 0 0 24px 60px;
    font-size: 14px;
}
p.hint.message {
    background-image: url("{{asset('img/written_test_2.info_icon.png')}}");
    background-repeat: no-repeat;
    background-size: 18px;
    background-position: 0;
}
.introduction-container p.hint.message {
    width: 354px!important;
    font-size: 14px;
    margin: 14px auto!important;
    font-weight: 700;
    color: #575757!important;
}
.introduction-container button {
    color: #1e415b;
    font-size: 15.4px;
    font-weight: 700;
    margin: 0 auto 16px!important;
    padding: 6px 16px;
    background: transparent;
    text-shadow: 0 1px 1px #fff;
    box-shadow: 0 1px 1px rgb(0 0 0 / 50%);
    border-radius: 5px;
    border: none;
    cursor:pointer;
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
<div class="main-content-container ">
    <div class="confirm-container" id="details_container">
        <h1>Confirm your details</h1>
        <div>
            <p>Name: {{$student->first_name}} {{$student->last_name}}</p>
            <p>Date of birth:</p>
            <p>Candidate number: {{$student->phone}}</p>
            <p class="hint message">If your details are not correct, please inform the invigilator.</p>
            <button style="cursor:pointer;" onclick="show_hide_containers()">My details are correct</button>
        </div>
    </div>
    <div class="introduction-container" id="instructions_container" style="display:none;">
        <h1>IELTS Academic Writing</h1>
        <p>Time: 1 hour</p>
        <h2>INSTRUCTIONS TO CANDIDATES</h2>
        <ul>
            <li>Answer <b>both</b> parts.</li>
            <li>You can change your answers at any time during the test.</li>
        </ul>
        <h2>INFORMATION FOR CANDIDATES</h2>
        <ul>
            <li>There are two parts in this test.</li>
            <li>Part 2 contributes twice as much as Part 1 to the writing score.</li>
            <li>The test clock will show you when there are 10 minutes and 5 minutes remaining.</li>
        </ul>
        <p class="hint message">Do not click 'Start test' until you are told to do so.</p>
        <div style="text-align:center;">
            <a href="{{route('student-computer-written-test-3',['student_id' => $student->id,'course_id' => $course->id,'type' => $type,'session' => $session])}}"><button>Start test</button></a>
        </div>
    </div>
</div>
   
</div>
<!--/#app -->
<script src="{{asset('js/app.js')}}"></script>
<script>
    function show_hide_containers()
    {
        $('#details_container').css('display','none');
        $('#instructions_container').css('display','block');
    }
</script>
</body>
</html>