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
    <div id="primary" class="height-full " style="padding:50px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-md-auto text-center" style="background:#fff;border-radius:10px;padding:50px;">
                    
                            <img src="{{asset('img/ielts_master_logo.jpeg')}}" style="width:120px;margin:10px auto 30px auto;" alt="" style="">
                    <h2>Password Reset Page</h2>
                    <p>Please enter new password!</p>
                    <form action="{{route('save-new-password')}}" method="post">
                        <div class="form-group">
                            <input type="password" id="password" class="form-control" style="width:400px;margin:20px auto;border-radius:20px;" name="password" placeholder="Password">
                            <input type="password" id="confirm_password" class="form-control" style="width:400px;margin:20px auto;border-radius:20px;" name="confirm_password" placeholder="Confirm Password" onkeyup="check_password();">
                            <p class="text-danger" id="password_error" style="display:none;">The password and confirm password didn't match</p>
                                        
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button class="btn btn-success" style="background:#ff7b00;width:200px;height:30px;line-height:15px;border-radius:20px;">Reset</button>
                            {{csrf_field()}}
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
</body>
</html>