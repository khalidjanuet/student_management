@extends('backend.layouts.master')
@section('title', 'Zoom')
@section('page_title','Zoom Channel Day Durations List')
@section('content')
@if(Session::has('delete_success'))
<div class="toast"
    data-title="Success!"
    data-message="Day Duration Deleted Successfully."
    data-type="warning">
</div>
@endif
<table class="table table-stripped table-hover" id="channel_table" style="width:100%;">
    <thead class="mb-res-header">
        <tr>
            <th class="mb-res-separator"></th>
            <th>Channel Name</th>
            <th>Day</th>
            <th>Duration</th>
            <th>Link</th>
            <th>Status</th>
            <th>Tutor</th>
            <th>Student ID</th>
            <th style="width:100px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($day->durations as $duration) 
        <tr>
            <td class="mb-res-separator"></td>
            <td class="mb-res"><span class="mb-res-left">Channel Name:</span><span class="mb-res-right">{{$duration->day->channel->name}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Days:</span><span class="mb-res-right">{{Carbon\Carbon::parse($duration->day->day)->format('d F Y')}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Duration:</span><span class="mb-res-right">{{Carbon\Carbon::parse($duration->from_duration)->format('h:i A') }} - {{Carbon\Carbon::parse($duration->to_duration)->format('h:i A')}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Link:</span><span class="mb-res-right"><input class="form-control" style="width:300px;padding:10px;" type="text" value="{{$duration->link}}"></span></td>
           
            <td class="mb-res"><span class="mb-res-left">Status:</span><span class="mb-res-right">@if($duration->is_booked == 1 )<span class='badge badge-pill badge-success'>Booked</span> @else <span class='badge badge-pill badge-warning'>Free</span>@endif</span></td>
            <td class="mb-res"><span class="mb-res-left">Tutor ID:</span><span class="mb-res-right">@if($duration->tutor_id > 0 ) {{$duration->tutor->name}} @endif</span></td>
            <td class="mb-res"><span class="mb-res-left">Student ID:</span><span class="mb-res-right">@if($duration->student_id > 0 ) {{$duration->student_id}} @endif</span></td>
            <td class="mb-res"><span class="mb-res-left">Action:</span><span class="mb-res-right">
                <a href="{{route('duration-delete',['id' => $duration->id])}}"><button class="btn btn-sm btn-danger">Delete</button></a></span>
            </td>
        </tr>
        @endforeach
    </tbody>
  <!--Add New Message Fab Button-->
  </table>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#channel_table').DataTable();
} );
</script>
@endsection