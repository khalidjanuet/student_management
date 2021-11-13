@extends('backend.layouts.master')
@section('title', 'Admin Bookings')
@section('page_title','Admin Speaking Test Bookings List')
@section('content')
@if(Session::has('booked_success'))
<div class="toast"
    data-title="Success!"
    data-message="Speaking Test Booked Successfully."
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
            <th>Start URL</th>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($durations as $duration) 
        <tr>
            <td class="mb-res-separator"></td>
            <td class="mb-res"><span class="mb-res-left">Channel Name:</span><span class="mb-res-right">{{$duration->day->channel->name}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Days:</span><span class="mb-res-right">{{Carbon\Carbon::parse($duration->day->day)->format('d F Y')}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Duration:</span><span class="mb-res-right">{{Carbon\Carbon::parse($duration->from_duration)->format('h:i A') }} - {{Carbon\Carbon::parse($duration->to_duration)->format('h:i A')}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Start URL:</span><span class="mb-res-right"><button class="btn btn-sm btn-primary" onclick="show_url_modal('{{$duration->start_link}}')">Show URL</button></span></td>
           
           
            <td class="mb-res"><span class="mb-res-left">Student ID:</span><span class="mb-res-right">@if($duration->student_id > 0 ) {{$duration->student_id}} @endif</span></td>
            <td class="mb-res">
                <span class="mb-res-left">Student Name:</span>
                <span class="mb-res-right">
                    @if($duration->student_id > 0 ) {{$duration->student->first_name}} {{$duration->student->last_name}} @endif
                </span>
            </td>
            <td class="mb-res"><span class="mb-res-left">Action:</span><span class="mb-res-right">
                @if($duration->tutor_id > 0) <button class="btn btn-sm btn-warning">Booked</button> @else <a href="{{route('tutor-book-speaking-test',['id' => $duration->id])}}"><button class="btn btn-sm btn-success">Book</button></a>@endif</span>
            </td>
        </tr>
        @endforeach
    </tbody>
  <!--Add New Message Fab Button-->
  </table>
  <div class="modal" id="start_url_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="max-width: 650px;">
    <div class="modal-content" >
       <div class="modal-header">
       <h5 class="modal-title">Start URL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center" >
       
        <div class="form-group " style="text-align:left;">
        <input type="text" class="form-control" id="start_url" value="">
		   <button class="btn btn-success" style="margin-top:10px;" onclick="copy_link();">Copy URL</button>
       </div>
      
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
$(document).ready(function() {
    $('#channel_table').DataTable();
} );
function show_url_modal(url)
{
    $("#start_url").val(url);
    $('#start_url_modal').modal('show');
}
function copy_link(){
		var copyText = document.getElementById('start_url');

		  /* Select the text field */
		copyText.select();
		copyText.setSelectionRange(0, 99999); /*For mobile devices*/

		  /* Copy the text inside the text field */
		document.execCommand("copy");

		}

</script>
@endsection