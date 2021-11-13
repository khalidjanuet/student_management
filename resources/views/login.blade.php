<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/basic/favicon.ico')}}" type="image/x-icon">
    <title>Admin Login</title>
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
    <div id="primary" class="p-t-b-100 height-full ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-md-auto">
                    <div class="text-center">
                        <img src="{{asset('img/ielts_master_logo.jpeg')}}" style="width:120px;" alt="">
                        <h3 class="mt-2">Admin Login</h3>
                        @if (session('authentication_error'))
                            <div class="alert alert-danger">
                                <h5>Email Address or Password Invalid!</h5>
                            </div>
                        @endif
                        @if (session('reset_success'))
                            <div class="alert alert-success">
                                <h5>Password Changed Successfully!</h5>
                            </div>
                        @endif
                        
                    </div>
                    <form action="{{route('authenticate-admin')}}" method="POST">
                        <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                            <input type="email" name="email" required class="form-control form-control-lg"
                                   placeholder="Email Address">
                        </div>
                        <div class="form-group has-icon"><i class="icon-user-secret"></i>
                            <input type="password" name="password" required class="form-control form-control-lg"
                                   placeholder="Password">
                        </div>
                        {{csrf_field()}}
                        <input type="submit" class="btn btn-success btn-lg btn-block" value="Log In" style="background:#ff7b00;">
                        
                         
                        <a href="{{route('forgot-password-page')}}"><p class="forget-pass">Forgot Password?</p></a>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>

<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->

</div>
<div class="modal" id="fee_saved_success_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="max-width: 650px;">
    <div class="modal-content" style="border-radius:1rem;">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center" style="padding:50px 20px;">
       <p class="selection-p" style="font-size:25px;color:#FF7B00;">Student Fee Record Has Been Verified. Please Login To Continue.</p>
      
     </div>
      
    </div>
  </div>
</div>
<!--/#app -->
<script src="{{asset('js/app.js')}}"></script>
@if(Session::has('fee_saved_success'))
    <script>
        $('#fee_saved_success_modal').modal('show');
    </script>
@endif
</body>
</html>