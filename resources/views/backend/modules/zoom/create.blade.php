@extends('backend.layouts.master')
@section('title', 'Test')
@section('page_title','Test Creation')
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
@if(Session::has('success'))
<div class="toast"
    data-title="Success!"
    data-message="Test Successfully Created."
    data-type="success">
</div>
@endif
<form action="{{route('writing-tests-save')}}" method="post" enctype="multipart/form-data">
  <div class="container-fluid">
    <div class="row"> 
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="label">Course:</div>
                    <select class="form-control select2" multiple name="course" id="course" required>
                        <option value="0">Select Course</option>
                        @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->first('course'))
                        <p class="text-danger">{{$errors->first('course')}}</p>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="label">Modules:</div>
                    <select class="form-control select2" name="session" id="" required>
                        <option value="0">Select Module</option>
                        
                    </select>
                    @if($errors->first('session'))
                        <p class="text-danger">{{$errors->first('session')}}</p>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="label">Test Type:</div>
                    <select class="form-control select2" name="type" id="" required>
                        <option value="0">Select Type</option>
                        <option value="1">Practice</option>
                        <option value="2">Mock</option>
                    </select>
                    @if($errors->first('type'))
                        <p class="text-danger">{{$errors->first('type')}}</p>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="label">Task:</div>
                    <select class="form-control select2" name="task" id="" required>
                        <option value="0">Select Task #</option>
                        <option value="1">Task 1</option>
                        <option value="2">Task 2</option>
                    </select>
                    @if($errors->first('task'))
                        <p class="text-danger">{{$errors->first('task')}}</p>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="label">Question:</div>
                    <textarea id="summernote" name="question" rows="10"></textarea>
                    @if($errors->first('question'))
                        <p class="text-danger">{{$errors->first('question')}}</p>
                    @endif
                </div>
            </div>
        </div>     
    </div>
   

    <div class="row">
    
    <div class="col-md-2">
      {{csrf_field()}}
      <button class="btn btn-success ">Submit</button>
    </div>
  </div>
  
</form>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>

$(document).ready(function() {
    $('#user_table').DataTable();
    $('#summernote').summernote({
        height:500
    });
    $('#summernote2').summernote({
        height:500
    });
} );

</script>
@endsection