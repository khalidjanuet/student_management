@extends('backend.layouts.master')
@section('title', 'Tests')
@section('page_title','Writing Tests')
@section('content')
@if(Session::has('delete_success'))
<div class="toast"
    data-title="Success!"
    data-message="Test Deleted Successfully."
    data-type="warning">
</div>
@endif
@if(Session::has('booked_success'))
<div class="toast"
    data-title="Success!"
    data-message="Test Booked Successfully."
    data-type="success">
</div>
@endif
<table class="table table-stripped table-hover" id="user_table" style="width:100%;">
    <thead class="mb-res-header">
        <tr>
        <th class="mb-res-separator"></th>
            <th style="width: 30px">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" id="checkedAll" class="custom-control-input"><label class="custom-control-label" for="checkedAll"></label>
                </div>
            </th>
            <th>ID</th>
            <th>Student Name</th>
            <th>Test Name</th>
            <th>Test Type</th>
            
            <th>Status</th>
            <th>Booking</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tests as $test) 
        <tr>
        <td class="mb-res-separator"></td>
            <td style="width: 30px" class="mb-res">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input checkSingle" id="user_id_{{$test->id}}" required=""><label class="custom-control-label" for="user_id_{{$test->id}}"></label>
                </div>
            </td>
            <td class="mb-res"><span class="mb-res-left">ID:</span><span class="mb-res-right"><a href="{{route('tutor-computer-test-checking',['test_id' => $test->id])}}">{{$test->student_id}}</a></span></td>
            <td class="mb-res"><span class="mb-res-left">Student Name:</span><span class="mb-res-right">{{$test->student->first_name}} {{$test->student->last_name}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Test Name:</span><span class="mb-res-right">{{$test->question->type == 1 ? 'Practise' : 'Mock'}}, {{$test->question->session}}, {{$test->question->task == 1 ? 'Task1' : 'Task2'}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Test Type:</span><span class="mb-res-right">{{$test->test_type == 1 ? 'Computerized' : 'Pen & Paper'}} | @if($test->test_type == 2) <a href="{{asset('answers')}}/{{$test->answer_sheet}}" download>Answer Sheet</a> @endif</span></td>
            
            <td class="mb-res"><span class="mb-res-left">ID:</span><span class="mb-res-right">@if($test->status == 0) <span class="badge badge-danger">Unchecked</span> @else <span class="badge badge-success">checked</span>@endif</span></td>
            
            <td class="mb-res"><span class="mb-res-left">Action:</span><span class="mb-res-right">
                @if($test->status == 0 && $test->tutor_id == Auth::user()->id)
                <a href="{{route('tutor-computer-test-checking',['test_id' => $test->id])}}"> <button class="btn btn-sm btn-primary">Check Test</button></a>
                @endif
            </td>
            <td class="mb-res"><span class="mb-res-left">Booking:</span><span class="mb-res-right">
                
                @if($test->tutor_id == Auth::user()->id)
                <button class="btn btn-success" style="display:inline-block;">Booked</button>
                @else
                <a href="{{route('writing-test-book',['id' => $test->id])}}"><button class="btn btn-success" style="display:inline-block;background:#ff7b00;">Book</button></a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
 </table>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#user_table').DataTable();
} );
</script>
@endsection