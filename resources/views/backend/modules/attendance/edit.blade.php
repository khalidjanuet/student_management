@extends('backend.layouts.master')
@section('title', 'Student Details')
@section('page_title','Student Details Edit')
@section('content')
@if(Session::has('update_success'))
<div class="toast"
    data-title="Success!"
    data-message="Student Data Updated Successfully."
    data-type="success">
</div>
@endif
<form action="{{route('student-update')}}" method="POST" enctype="multipart/form-data" style="padding:0 50px 50px 50px;">
    <div class="row mb-3">
        <div class="col-md-12 text-center">
        <img src="{{asset('img/student')}}/{{$student->image}}" alt="" width="100" height="100">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <div class="label">Full Name:</div>
                <input type="text" class="form-control" name="full_name" id="" value="{{$student->name}}">
                @if($errors->first('full_name'))
                    <p class="text-danger">{{$errors->first('full_name')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="label">Father Name:</div>
                <input type="text" class="form-control" name="father_name" id="" value="{{$student->father_name}}">
                @if($errors->first('father_name'))
                    <p class="text-danger">{{$errors->first('father_name')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="label">Mother Name:</div>
                <input type="text" class="form-control" name="mother_name" id="" value="{{$student->mother_name}}">
                @if($errors->first('mother_name'))
                    <p class="text-danger">{{$errors->first('mother_name')}}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <div class="label">Profile Image:</div>
                <input type="file" class="form-control" name="profile_image" id="">
                @if($errors->first('profile_image'))
                    <p class="text-danger">{{$errors->first('profile_image')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="label">Religion:</div>
                <input type="text" class="form-control" name="religion" id="" value="{{$student->religion}}">
                @if($errors->first('religion'))
                    <p class="text-danger">{{$errors->first('religion')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="label">Father Occupation:</div>
                <input type="text" class="form-control" name="father_occupation" id="" value="{{$student->father_occupation}}">
                @if($errors->first('father_occupation'))
                    <p class="text-danger">{{$errors->first('father_occupation')}}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <div class="label">Gender:</div>
                <select class="form-control" name="gender" id="">
                    <option value="{{$student->gender}}">{{$student->gender == 1 ? 'Male' : 'Female'}}</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
                @if($errors->first('gender'))
                    <p class="text-danger">{{$errors->first('gender')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="label">Date Of Birth:</div>
                <input type="text" class="form-control" name="dob" id="" value="{{Carbon\Carbon::parse($student->dob)->format('d-m-Y')}}"  placeholder="DD-MM-YYYY">
                @if($errors->first('dob'))
                    <p class="text-danger">{{$errors->first('dob')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="label">Date of Admission:</div>
                <input type="text" class="form-control" name="admission_date" value="{{Carbon\Carbon::parse($student->admission_date)->format('d-m-Y')}}" id="" placeholder="DD-MM-YYYY">
                @if($errors->first('admission_date'))
                    <p class="text-danger">{{$errors->first('admission_date')}}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <div class="label">Class:</div>
                <select class="form-control" name="class_id" id="">
                    <option value="{{$student->class_id}}">{{$student->class->title}}</option>
                    <option value="1">Class 1</option>
                    <option value="2">Class 2</option>
                </select>
                @if($errors->first('class_id'))
                    <p class="text-danger">{{$errors->first('class_id')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="label">Section:</div>
                <select class="form-control" name="section_id" id="">
                    <option value="{{$student->section_id}}">{{$student->section->title}}</option>
                    <option value="1">A</option>
                    <option value="2">B</option>
                </select>
                @if($errors->first('section_id'))
                    <p class="text-danger">{{$errors->first('section_id')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="label">Roll Number:</div>
                <input type="text" class="form-control" name="roll_number" id="" value="{{$student->roll_no}}">
                @if($errors->first('roll_number'))
                    <p class="text-danger">{{$errors->first('roll_number')}}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <div class="label">Email:</div>
                <input type="email" class="form-control" name="email" id="" value="{{$student->email}}">
                @if($errors->first('email'))
                    <p class="text-danger">{{$errors->first('email')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="label">Address:</div>
                <input type="text" class="form-control" name="address" id="" value="{{$student->address}}">
                @if($errors->first('address'))
                    <p class="text-danger">{{$errors->first('address')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="label">Phone:</div>
                <input type="text" class="form-control" name="phone" id="" value="{{$student->phone}}">
                @if($errors->first('phone'))
                    <p class="text-danger">{{$errors->first('phone')}}</p>
                @endif
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 text-center">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$student->id}}">
            <input type="submit" class="btn btn-success btn-lg btn-block" value="Update" style="background:#0C6B59;width:300px;margin:10px auto;">
        </div>
    </div>
    

</form>
@endsection

</script>