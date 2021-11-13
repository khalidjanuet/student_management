@extends('backend.layouts.master')
@section('title', 'Courses')
@section('page_title','Courses Details')
@section('content')

<form action="{{route('course-update')}}" method="post" enctype="multipart/form-data">
  <div class="container-fluid">
    <div class="row"> 
        <div class="col-md-6">
            <div class="form-group">
                <div class="label">Course Name:</div>
                <input type="text" class="form-control" name="name" id="" value="{{$course->name}}" readonly="true" required>
                @if($errors->first('name'))
                    <p class="text-danger">{{$errors->first('name')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="label">Course Duration:</div>
                <input type="text" class="form-control" name="duration" id="" value="{{$course->duration}}" readonly="true" required>
                @if($errors->first('duration'))
                    <p class="text-danger">{{$errors->first('duration')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="label">Course Fee:</div>
                <input type="text" class="form-control" name="fee" id="" value="{{$course->fee}}" readonly="true" required>
                @if($errors->first('fee'))
                    <p class="text-danger">{{$errors->first('fee')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="label">Number of ACA regular classes:</div>
                <input type="text" class="form-control" name="aca_regular_classes" id=""  required readonly="true" value="{{$course->aca_regular_classes}}">
                @if($errors->first('aca_regular_classes'))
                    <p class="text-danger">{{$errors->first('aca_regular_classes')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="label">Number of GEN regular classes:</div>
                <input type="text" class="form-control" name="gen_regular_classes" id="" required  readonly="true" value="{{$course->gen_regular_classes}}">
                @if($errors->first('gen_regular_classes'))
                    <p class="text-danger">{{$errors->first('gen_regular_classes')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="label">Number of writing workshops:</div>
                <input type="text" class="form-control" name="writing_workshops" id="" readonly="true" value="{{$course->writing_workshops}}">
                @if($errors->first('writing_workshops'))
                    <p class="text-danger">{{$errors->first('writing_workshops')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="label">Number of speaking workshops:</div>
                <input type="text" class="form-control" name="speaking_workshops" id="" readonly="true" value="{{$course->speaking_workshops}}">
                @if($errors->first('speaking_workshops'))
                    <p class="text-danger">{{$errors->first('speaking_workshops')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="label">Number of grammar classes:</div>
                <input type="text" class="form-control" name="grammar_classes" id="" readonly="true" value="{{$course->grammar_classes}}">
                @if($errors->first('grammar_classes'))
                    <p class="text-danger">{{$errors->first('grammar_classes')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="label">Number of listening tests:</div>
                <input type="text" class="form-control" name="listening_tests" id="" readonly="true" value="{{$course->listening_tests}}">
                @if($errors->first('listening_tests'))
                    <p class="text-danger">{{$errors->first('listening_tests')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="label">Number of reading tests:</div>
                <input type="text" class="form-control" name="reading_tests" id="" readonly="true" value="{{$course->reading_tests}}">
                @if($errors->first('reading_tests'))
                    <p class="text-danger">{{$errors->first('reading_tests')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="label">Number of writing tests:</div>
                <input type="text" class="form-control" name="writing_tests" id="" readonly="true" value="{{$course->writing_tests}}">
                @if($errors->first('writing_tests'))
                    <p class="text-danger">{{$errors->first('writing_tests')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="label">Number of speaking tests:</div>
                <input type="text" class="form-control" name="speaking_tests" id="" readonly="true" value="{{$course->speaking_tests}}">
                @if($errors->first('speaking_tests'))
                    <p class="text-danger">{{$errors->first('speaking_tests')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="label">Number of Practice tests:</div>
                <input type="text" class="form-control" name="practice_tests" id="" readonly="true" value="{{$course->practice_tests}}">
                @if($errors->first('practice_tests'))
                    <p class="text-danger">{{$errors->first('practice_tests')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="label">Number of Mock tests:</div>
                <input type="text" class="form-control" name="mock_tests" id="" readonly="true" value="{{$course->mock_tests}}">
                @if($errors->first('mock_tests'))
                    <p class="text-danger">{{$errors->first('mock_tests')}}</p>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <div class="label">Number of Sessions (comma separated):</div>
                <input type="text" class="form-control" name="sessions" id=""  readonly="true" required placeholder="L1,L2,R1,R2,S1,S2" value="{{$sessions}}">
                @if($errors->first('sessions'))
                    <p class="text-danger">{{$errors->first('sessions')}}</p>
                @endif
            </div>
        </div>

         
    </div>
   

    <div class="row">
    
    <div class="col-md-2">
     
    </div>
  </div>
  
</form>
@endsection
@section('scripts')

@endsection