@extends('backend.layouts.master')
@section('title', 'IELTS MASTER')
@section('page_title','Change Admin Details')
@section('content')
<form class="form-horizontal" action="{{route('update-admin-details')}}" method="post" onSubmit="return validate()" autocomplete="off">
   
   @if(Session::has('update_success'))
   <div class="form-group" id="password_changed">
        <div role="alert" class="alert alert-success"><strong>Admin Details Changed Successfully!</strong>.
        </div>
    </div>
    @endif
     <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Name</label>

        <div class="col-sm-10">
            <input class="form-control" name="name" id="name" placeholder="Name" type="text" value="{{Auth::user()->name}}" required>
        </div>
    </div>
     <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Email</label>

        <div class="col-sm-10">
            <input class="form-control" name="email" id="email" placeholder="Email" type="email" value="{{Auth::user()->email}}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Old Password</label>

        <div class="col-sm-10">
            <input class="form-control" id="old_password" placeholder="Enter Old Password" type="password" onblur="check_old_password();" autocomplete="false">
            <p class="text-danger" id="old_password_error" style="display:none;">Wrong Old Password</p>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">New Password</label>

        <div class="col-sm-10">
            <input class="form-control" name="password" id="password" placeholder="Enter New Password" type="password">
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Confirm New Password</label>

        <div class="col-sm-10">
            <input class="form-control" id="confirm_password" placeholder="Confirm New Password" type="password">
            <p class="text-danger" id="password_error" style="display:none;">Password mismatch</p>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{csrf_field()}}
            <button type="submit" class="btn btn-danger" id="update_button">Update Details</button>
        </div>
    </div>
</form>
@endsection
@section('scripts')

<script>
 function check_old_password()
    {
        var old_password = $('#old_password').val();
        $.ajax({
                type:'GET',
                url:"{{route('check-old-password')}}",
                data:{'old_password':old_password},
                success:function(data){
                    if(data == 1)
                    {
                        $('#old_password_error').css('display','none');
                        $('#update_button').prop('disabled', false);
                    }
                    else
                    {
                        $('#old_password_error').css('display','block');
                        $('#update_button').prop('disabled', true);
                    }
                }
		    });
    }
    function validate()
    {
        
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();
        if(password == confirm_password)
        {
            $('#password_error').css('display','none');
            return true;
        }
        else
        {
            $('#password_error').css('display','block');
            return false;
        }
    }
</script>
@endsection
