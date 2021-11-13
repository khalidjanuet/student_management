@extends('backend.layouts.master')
@section('title', 'Student')
@section('page_title','Students List')
@section('content')
@if(Session::has('delete_success'))
<div class="toast"
    data-title="Success!"
    data-message="Student Deleted Successfully."
    data-type="warning">
</div>
@endif
<div style="text-align:center;">
    {{$students->links()}}
</div>
<table class="table table-stripped table-hover" id="student_table" style="width:100%;">
    <thead class="mb-res-header">
        <tr>
        <th class="mb-res-separator"></th>
            <th style="width: 30px">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" id="checkedAll" class="custom-control-input"><label class="custom-control-label" for="checkedAll"></label>
                </div>
            </th>
            <th>ID</th>
            {{--<th style="width:50px;">Photo</th>--}}
            <th>Name</th>
            <th>Course</th>
            <th>Mobile #</th>
            <th>E-mail</th>
            <th style="width:100px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student) 
        <tr>
        <td class="mb-res-separator"></td>
            <td style="width: 30px" class="mb-res">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input checkSingle" id="student_id_{{$student->id}}" required=""><label class="custom-control-label" for="student_id_{{$student->id}}"></label>
                </div>
            </td>
            <td class="mb-res"><span class="mb-res-left">ID:</span><span class="mb-res-right"><a href="{{route('student-pre-detail',['id' => $student->id])}}">{{$student->id}}</a></span></td>
            {{--<td class="mb-res"><span class="mb-res-left">Image:</span><span class="mb-res-right"><a href="{{route('student-pre-detail',['id' => $student->id])}}"><img src="{{asset('img/student')}}/{{$student->profile_image}}" style="width:30px;border-radius:50%;"></a></span></td>--}}
            <td class="mb-res"><span class="mb-res-left">Name:</span><span class="mb-res-right"><a href="{{route('student-pre-detail',['id' => $student->id])}}">{{$student->first_name}} {{$student->last_name}}</a></span></td>
            <td class="mb-res"><span class="mb-res-left">Course:</span><span class="mb-res-right">{{$student->course->name}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Phone:</span><span class="mb-res-right">{{$student->phone}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Email:</span><span class="mb-res-right">{{$student->email}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Action:</span><span class="mb-res-right">
                <a href="{{route('student-pre-detail',['id' => $student->id])}}"><i class="icon-eye mr-3"></i></a>
                <a href="{{route('student-edit',['id' => $student->id])}}" ><i class="icon-pencil mr-3"></i></a>
                <a href="{{route('student-delete',['id' => $student->id])}}"><i class="icon-trash"></i></a></span>
            </td>
        </tr>
        @endforeach
    </tbody>
  <!--Add New Message Fab Button-->
  <a href="{{route('student-create')}}" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i class="icon-add"></i></a>    
</table>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#student_table').DataTable( {
        "paging":   false,
    } );
} );
</script>
@endsection