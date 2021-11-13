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
                        <h3>Writing</h3>
                        <p>The Writing practice test consists of 2 tasks.</p>
                        <p><strong>Task 1:</strong> You will be asked to write 150 words and spend about 20 minutes on this task.</p>
                        <p><strong>Task 2:</strong> You will be asked to write 250 words and spend about 40 minutes on this task.</p>
                    </div>
                    <div class="fam_links">
                        <div class="div_center">
                        <a href="{{route('student-computer-written-test-2',['student_id' => $student->id,'course_id' => $course->id,'type' => $type,'session' => $session])}}"><img src="{{asset('img/writing.svg')}}" alt=""> AC Writing test</a>
                            <a href="https://assets.ctfassets.net/unrdeg6se4ke/40PDaBgplcQElAbg0yiukY/fe545b694ad773b5be3556a0e517edc0/academic-writing-sample-candidate-responses-and-examiner-comments.pdf" target="_blank"><img src="{{asset('img/pdf_white.svg')}}" alt=""> Download answer key</a>
                        </div>
                    </div>
                    <!-- <div class="fam_links">
                        <div class="div_center">
                            <a href="https://computer.ieltsessentials.com/general-training-writing/?_ga=2.48765166.913877213.1561523997-150541385.1556704126" target="_blank"><img src="{{asset('img/writing.svg')}}" alt=""> GT Writing test</a>
                            <a href="https://assets.ctfassets.net/unrdeg6se4ke/4ztA7rUK2q1dDjBCKx1LYJ/028a88eeeed26471bf49822a1957bfad/general-training-writing-sample-candidate-responses-and-examiner-comm.pdf" target="_blank"><img src="{{asset('img/pdf_white.svg')}}" alt=""> Download answer key</a>
                        </div>
                    </div> -->
                </div>
            </div>
    </div>
</div>
<!--/#app -->
<script src="{{asset('js/app.js')}}"></script>
<script>

</script>
</body>
</html>