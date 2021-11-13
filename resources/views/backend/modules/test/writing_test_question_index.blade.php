@extends('backend.layouts.master')
@section('title', 'question')
@section('page_title','Writing Tests List')
@section('content')
@if(Session::has('delete_success'))
<div class="toast"
    data-title="Success!"
    data-message="Writing Test Deleted Successfully."
    data-type="warning">
</div>
@endif
<table class="table table-stripped table-hover" id="question_table" style="width:100%;">
    <thead class="mb-res-header">
        <tr>
        <th class="mb-res-separator"></th>
            <th style="width: 30px">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" id="checkedAll" class="custom-control-input"><label class="custom-control-label" for="checkedAll"></label>
                </div>
            </th>
            <th>Course</th>
            <th>Session</th>
            <th style="width:50px;">Type</th>
            <th>Task </th>
            <th>Question</th>
            <th style="width:100px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($questions as $question) 
        @if(($question->type == 1 || $question->type == 2) && $question->task == 1)
        <tr>
        <td class="mb-res-separator"></td>
            <td style="width: 30px" class="mb-res">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input checkSingle" id="question_id_{{$question->id}}" required=""><label class="custom-control-label" for="question_id_{{$question->id}}"></label>
                </div>
            </td>
            <td class="mb-res"><span class="mb-res-left">Course:</span><span class="mb-res-right">{{$question->course_id}}</span></td>
            
            <td class="mb-res"><span class="mb-res-left">Session:</span><span class="mb-res-right">{{$question->session}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Type:</span><span class="mb-res-right">{{$question->type == 1 ? 'Practice' : 'Mock'}}</span></td>
            @if($question->type == 1)
            <td class="mb-res"><span class="mb-res-left">Task:</span><span class="mb-res-right">Task {{$question->task}}</span></td>
            @elseif($question->type == 2 )
            <td class="mb-res"><span class="mb-res-left">Task:</span><span class="mb-res-right">Task 1 & 2</span></td>
           
            @endif
            <td class="mb-res"><span class="mb-res-left">Question:</span><span class="mb-res-right"><button class="btn btn-success" onclick="show_question({{$question->id}})">Show Question</button></span></td>
           
            <td class="mb-res"><span class="mb-res-left">Action:</span><span class="mb-res-right">
                
                <a href="{{route('writing-tests-edit',['id' => $question->id])}}" ><i class="icon-pencil mr-3"></i></a>
                <a href="{{route('writing-tests-delete',['id' => $question->id])}}"><i class="icon-trash"></i></a></span>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
  <!--Add New Message Fab Button-->
  <a href="{{route('writing-tests-create')}}" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i class="icon-add"></i></a>    
</table>
<div class="modal" id="question_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="max-width: 650px;">
    <div class="modal-content" style="border-radius:1rem;">
       <div class="modal-header">
       <h5 class="modal-title">Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center" id="modal_body_question">
       
       
      
     </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function(){
    $('#question_table').DataTable();
});
function show_question(id)
{
    $.ajax({
            type:'GET',
            url:"{{route('course-get-question-only')}}",
            data:{'id':id},
            success:function(data)
            {
                $('#modal_body_question').html(data);
                $('#question_modal').modal('show');
            }
        });
}
</script>
@endsection