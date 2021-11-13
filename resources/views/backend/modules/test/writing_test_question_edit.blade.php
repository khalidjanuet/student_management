@extends('backend.layouts.master')
@section('title', 'Test')
@section('page_title','Test Updation')
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
@if(Session::has('updated_success'))
<div class="toast"
    data-title="Success!"
    data-message="Test Successfully Updated."
    data-type="success">
</div>
@endif
<form action="{{route('writing-tests-update')}}" method="post" enctype="multipart/form-data">
  <div class="container-fluid">
    <div class="row"> 
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="label">Course:</div>
                    <select class="form-control select2" name="course" id="course"  required>
                        <option value="{{$question->course_id}}">{{$question->course->name}}</option>
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
                    <div class="label">Test Type:</div>
                    <select class="form-control select2" name="type" id="test_type" onchange="show_practice_or_mock_divs();" required>
                        <option value="{{$question->type}}">{{$question->type == 1 ? 'Practice' : 'Mock'}}</option>
                        <option value="1">Practice</option>
                        <option value="2">Mock</option>
                    </select>
                    @if($errors->first('type'))
                        <p class="text-danger">{{$errors->first('type')}}</p>
                    @endif
                </div>
            </div>
            <div class="col-md-12" id="practice_type_div" style="display:{{$question->type == 1 ? 'block' : 'none'}};">
                <div class="form-group">
                    <div class="label">Task:</div>
                    <select class="form-control select2" name="task_type_1" id="task" onchange="get_sessions()" required>
                        <option value="{{$question->task}}">{{$question->task == 1 ? 'Task 1' : 'Task 2'}}</option>
                        <option value="1">Task 1</option>
                        <option value="2">Task 2</option>
                    </select>
                    @if($errors->first('task'))
                        <p class="text-danger">{{$errors->first('task')}}</p>
                    @endif
                </div>
            </div>
            <div class="col-md-12" id="mock_type_div" style="display:{{$question->type == 2 ? 'block' : 'none'}};">
                <div class="form-group">
                    <div class="label">Task:</div>
                    <select class="form-control select2" name="task_type_2" id="task_2" required>
                        <option value="{{$question->task}}" selected>Task 1 & 2</option>
                     
                    </select>
                    @if($errors->first('task_type_2'))
                        <p class="text-danger">{{$errors->first('task_type_2')}}</p>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="label">Modules:</div>
                    <select class="form-control select2" name="session" id="session" required>
                        <option value="{{$question->session_id}}">{{$question->session_id}}</option>
                        
                        
                    </select>
                    @if($errors->first('session'))
                        <p class="text-danger">{{$errors->first('session')}}</p>
                    @endif
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                    <div class="label">Question:</div>
                    <textarea id="summernote" name="question" rows="10">{{$question->question}}</textarea>
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
      <input type="hidden" name="question_id" value="{{$question->id}}">
      <button class="btn btn-success ">Update</button>
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
    get_remaining_sessions();
} );
function show_practice_or_mock_divs()
{
    var type = $('#test_type').val();
    if(type == 1)
    {
        $('#mock_type_div').css('display','none');
        $('#practice_type_div').css('display','block');
    }
    else if(type == 2)
    {
        $('#practice_type_div').css('display','none');
        $('#mock_type_div').css('display','block');
        $.ajax({
                type:'GET',
                url:"{{route('course-session-details-for-mock-test-ajax')}}",
                data:{'course_id':$('#course').val(),'task':$('#task_2').val(),'type': $('#test_type').val()},
                success:function(data){
                    $('#session').html(data);
                   
                }
		    });
    }
}
function get_remaining_sessions()
{
        var test_type = $('#test_type').val();
        if(test_type == 1)
        {
            $.ajax({
                type:'GET',
                url:"{{route('course-session-details-ajax')}}",
                data:{'course_id':$('#course').val(),'task':$('#task').val(),'type': $('#test_type').val()},
                success:function(data){
                    $('#session').append(data);
                   
                }
		    });
        }
        else
        {
            $.ajax({
                type:'GET',
                url:"{{route('course-session-details-for-mock-test-ajax')}}",
                data:{'course_id':$('#course').val(),'task':$('#task_2').val(),'type': $('#test_type').val()},
                success:function(data){
                    console.log(data);
                    $('#session').append(data);
                   
                }
		    });
        }
       
       
}
function get_sessions()
{
        var test_type = $('#test_type').val();
        if(test_type == 1)
        {
            $.ajax({
                type:'GET',
                url:"{{route('course-session-details-ajax')}}",
                data:{'course_id':$('#course').val(),'task':$('#task').val(),'type': $('#test_type').val()},
                success:function(data){
                    $('#session').html(data);
                   
                }
		    });
        }
        else
        {
            $.ajax({
                type:'GET',
                url:"{{route('course-session-details-for-mock-test-ajax')}}",
                data:{'course_id':$('#course').val(),'task':$('#task_2').val(),'type': $('#test_type').val()},
                success:function(data){
                    console.log(data);
                    $('#session').html(data);
                   
                }
		    });
        }
       
       
}

</script>
@endsection