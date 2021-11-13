@extends('backend.layouts.master')
@section('title', 'Admin Bookings')
@section('page_title','Admin Speaking Test Bookings List')
@section('content')
@if(Session::has('saved_success'))
<div class="toast"
    data-title="Success!"
    data-message="Tutor Successfully."
    data-type="success">
</div>
@endif
<table class="table table-stripped table-hover" id="channel_table" style="width:100%;">
    <thead class="mb-res-header">
        <tr>
            <th class="mb-res-separator"></th>
            <th>Channel Name</th>
            <th>Day</th>
            <th>Duration</th>
            <th>Status</th>
            <th>Tutor</th>
            <th>Student ID</th>
            <th style="width:100px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($durations as $duration) 
        <tr>
            <td class="mb-res-separator"></td>
            <td class="mb-res"><span class="mb-res-left">Channel Name:</span><span class="mb-res-right">{{$duration->day->channel->name}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Days:</span><span class="mb-res-right">{{Carbon\Carbon::parse($duration->day->day)->format('d F Y')}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Duration:</span><span class="mb-res-right">{{Carbon\Carbon::parse($duration->from_duration)->format('H:i A') }} - {{Carbon\Carbon::parse($duration->to_duration)->format('H:i A')}}</span></td>
           
            <td class="mb-res"><span class="mb-res-left">Status:</span><span class="mb-res-right">@if($duration->is_booked == 1 )<span class='badge badge-pill badge-success'>Booked</span> @else <span class='badge badge-pill badge-warning'>Free</span>@endif</span></td>
            <td class="mb-res">
                <span class="mb-res-left">Tutor ID:</span>
                <span class="mb-res-right">
                    @if($duration->tutor_id > 0 )
                     {{$duration->tutor->name}}
                    @else
                        <form action="{{route('assign-tutor-to-speaking-test')}}" id="form_{{$duration->id}}" method="post">
                            <select class="form-control select2" name="tutor_id" id="tutor_id" onchange="assign_tutor({{$duration->id}})">
                                <option value="">Select Tutor</option>
                                @foreach($tutors as $tutor)
                                    <option value="{{$tutor->id}}">{{$tutor->name}}</option>
                                @endforeach
                            </select>
                            @csrf
                            <input type="hidden" name="duration_id" value="{{$duration->id}}">
                        </form>
                    @endif</span></td>
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
function assign_tutor(id)
{
    $('#form_'+id).submit();
}
</script>
@endsection