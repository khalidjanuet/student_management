@extends('backend.layouts.master')
@section('title', 'Courses')
@section('page_title','Courses List')
@section('content')
@if(Session::has('success'))
<div class="toast"
    data-title="Success!"
    data-message="Course Details Updated Successfully."
    data-type="success">
</div>
@endif
@if(Session::has('delete_success'))
<div class="toast"
    data-title="Success!"
    data-message="Course Deleted Successfully."
    data-type="danger">
</div>
@endif
<table class="table table-stripped table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
    <thead class="mb-res-header">
        <tr>
        <th class="mb-res-separator"></th>
            <th>ID</th>
            <th>Name</th>
            <th>Duration</th>
            <th>Fee</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody> 
        @foreach($courses as $course)
            <tr>
            <td class="mb-res-separator"></td>
                <td class="mb-res"><span class="mb-res-left"> ID:</span><span class="mb-res-right">{{$course->id}}</span></td>
                <td class="mb-res"><span class="mb-res-left">Name:</span><span class="mb-res-right">{{$course->name}}</span></td>
                <td class="mb-res"><span class="mb-res-left">Duration:</span><span class="mb-res-right">{{$course->duration}}</span></td>
                <td class="mb-res"><span class="mb-res-left">Fee:</span><span class="mb-res-right">{{$course->fee}}</span></td>
                <td class="mb-res"><span class="mb-res-left">Status:</span><span class="mb-res-right"><span class="badge {{$course->status == 1 ? 'badge-success' : 'badge-warning'}}">{{$course->status == 1 ? 'Active' : 'Deactivated'}}</span></span></td>
                <td class="mb-res"><span class="mb-res-left">Action:</span><span class="mb-res-right"><a href="{{route('course-view',['id' => $course->id])}}"><i class="icon-eye mr-3"></i></a><a href="{{route('course-edit',['id' => $course->id])}}"><i class="icon-pencil mr-3" style="cursor:pointer;"></i></a><a href="{{route('course-delete',['id' => $course->id])}}"><i class="icon-trash"></i></a></span></td>
            </tr>
        @endforeach
    </tbody>
  <!--Add New Message Fab Button-->
  <a href="{{route('course-create')}}" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i class="icon-add"></i></a>    
</table>

@endsection
@section('scripts')

@endsection