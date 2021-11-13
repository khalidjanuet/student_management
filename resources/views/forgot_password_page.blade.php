<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/basic/favicon.ico')}}" type="image/x-icon">
    <title>IELTS MASTER</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
       

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
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
<main>
    <div id="primary" class=" height-full " style="padding:50px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-md-auto text-center"> 
                    <div class="row" style="background:#fff;border-radius:10px;padding:50px;">
                            <img src="{{asset('img/ielts_master_logo.jpeg')}}" style="width:120px;margin:10px auto 30px auto;" alt="">
                            @if(Session::has('success'))
                                <div style="padding:20px;border-radius:10px;background:#ff7b00;margin-bottom:10px;">
                                    <h5>SUCCESS! </h5>
                                    <p>Successfully Sent Email.please check your {{Session::get('email')}} email for password reset link. If you do not receive an email within a few minutes, please check your Junk E-mail or Spam folder just in case the email got delivered there instead of your inbox.</p>

                                </div>
                            @endif
                        <div class="col-md-12">
                            <h2>Send Forgot Password Link</h2>
                            <p>Please enter your email address to receive a password reset link.</p>
                            <form action="{{route('send-password-reset-email')}}" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" style="width:400px;margin:20px auto;border-radius:20px;" name="email" placeholder="Email">
                                    <button class="btn btn-success" style="background:#ff7b00;width:200px;height:30px;line-height:15px;border-radius:20px;">Send</button>
                                    {{csrf_field()}}
                                </div>
                            </form>
                        </div>
                    </div>
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
</body>
</html>