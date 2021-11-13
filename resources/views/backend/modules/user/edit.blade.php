<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/basic/favicon.ico')}}" type="image/x-icon">
    <title>User Registration Form</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
</head>
<body class="light">
@if(Session::has('updated_success'))
<div class="toast"
    data-title="Success!"
    data-message="User Data Updated Successfully."
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
        <h1 class="page-title">User Edit</h1>
    </div>
    <div class="banner-overlay"></div>
</div>
    <div id="primary" class="p-t-b-50 height-full" style="background:#fff;padding:0 10px;">
        <div class="container" style="background:#f3f5f8;border-radius:10px;padding:20px 0;">
            <div class="row">
                <div class="col-lg-12 mx-md-auto" style="color:#000;">
                    <div style="margin-left:20px;">
                        <a href="{{route('users',['type' => 1])}}"><button class="btn btn-sm btn-primary">Back To Users List</button></a>
                    </div>
                    <div class="text-center">
                        <img src="{{asset('img/ielts_master_logo.jpeg')}}" style="width:120px;margin:10px auto 30px auto;" alt="" style="">
                        
                        <h1 class="mt-2" style="color:#000;font-weight:600;">User Edit Form</h1>  
                        
                    </div>
                    <form action="{{route('user-update')}}" method="POST" enctype="multipart/form-data" style="padding:50px;">
                        <div class="row">
                            
                            <div class="col-md-3">
                                <h5>Name:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="" placeholder="Name" required value="{{$user->name}}"> 
                                    @if($errors->first('name'))
                                        <p class="text-danger">{{$errors->first('name')}}</p>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                       
                      
                       <div class="row">
                            <div class="col-md-3">
                                <h5>Email:<span style="color:red;">*</span></h5>
                            </div>
                           <div class="col-md-4">
                               <div class="form-group">
                                   <input type="email" class="form-control" name="email" id="" value="{{$user->email}}" required>
                                   @if($errors->first('email'))
                                       <p class="text-danger">{{$errors->first('email')}}</p>
                                   @endif
                               </div>
                           </div>
                       </div>
                       <div class="row">
                            <div class="col-md-3">
                                <h5>Password:<span style="color:red;">*</span></h5>
                            </div>
                           <div class="col-md-4">
                               <div class="form-group">
                                   <input type="password" class="form-control" name="password" id="password" autofill="false" value="">
                                   @if($errors->first('password'))
                                       <p class="text-danger">{{$errors->first('password')}}</p>
                                   @endif
                               </div>
                           </div>
                       </div>
                       <div class="row">
                            <div class="col-md-3">
                                <h5>Confirm Password:<span style="color:red;">*</span></h5>
                            </div>
                           <div class="col-md-4">
                               <div class="form-group">
                                   <input type="password" class="form-control" name="confirm_password" id="confirm_password" onblur="check_password()" value="">
                                   @if($errors->first('confirm_password'))
                                       <p class="text-danger">{{$errors->first('confirm_password')}}</p>
                                   @endif
                                   <p class="text-danger" id="password_error" style="display:none;">The password and confirm password didn't match</p>
								
                               </div>
                           </div>
                       </div>
                      
                     
                       <div class="row">
                            <div class="col-md-3">
                                <h5>User Type:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <select class="form-control" name="role" id="role" onchange="show_hide_modules()" required>
                                    <option value="{{$user->role}}">@if($user->role == 3) Tutor @elseif($user->role == 4) Business Lead @elseif($user->role == 6) Business Administrator @endif</option>
                                    <option value="3">Tutor</option>
                                    <option value="4">Business Lead</option>
                                    @if(Auth::user()->role != 1)
                                    <option value="6">Business Administrator</option>
                                    @endif
                                </select>
                                @if($errors->first('role'))
                                    <p class="text-danger">{{$errors->first('role')}}</p>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="row" id="module_div" style="display:{{$user->role == 3 ? 'flex' : 'none'}};">
                            <div class="col-md-3">
                                <h5>Access to module:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <select class="form-control select2" multiple name="modules[]" id="" >
                                    <option value="0">Select Modules</option>
                                    <option value="1" {{$user->listening == 1 ? 'selected' : ''}}>Listening</option>
                                    <option value="2" {{$user->reading == 1 ? 'selected' : ''}}>Reading</option>
                                    <option value="3" {{$user->writing == 1 ? 'selected' : ''}}>Writing</option>
                                    <option value="4" {{$user->speaking == 1 ? 'selected' : ''}}>Speaking</option>
                                </select>
                                @if($errors->first('modules'))
                                    <p class="text-danger">{{$errors->first('modules')}}</p>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Upload your photo:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <img src="{{asset('img/user')}}/{{$user->img}}" style="width:100px;margin:20px 0;" alt="">
                                    <input type="file" class="form-control" name="profile_image" id="" >
                                    @if($errors->first('profile_image'))
									    <p class="text-danger">{{$errors->first('profile_image')}}</p>
								    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                {{csrf_field()}}
                                <input type="submit" id="submit_button" class="btn btn-success btn-lg btn-block" value="Submit Form" style="background:#ff7b00;width:300px;margin:10px auto;">
                            </div>
                        </div>
                        
                        <input type="hidden" name="user_id" value="{{$user->id}}">
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
    function show_hide_modules()
    {
        
        var role = $('#role').val();
        console.log(role);
        if(role == 3)
        {
            $('#module_div').css('display','flex');
        }
        else
        {
            $('#module_div').css('display','none');
        }
    }
    function check_password()
    {
        
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();
        
        if(password == confirm_password)
        {
            $('#password_error').css('display','none');
            $('#submit_button').prop('disabled',false);
        }
        else
        {
            $('#password_error').css('display','block');
            $('#submit_button').prop('disabled',true);
        }
    }
</script>
</body>
</html>