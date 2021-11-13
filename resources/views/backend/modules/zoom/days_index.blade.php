@extends('backend.layouts.master')
@section('title', 'Zoom')
@section('page_title','Zoom Channel Days List')
@section('content')
@if(Session::has('delete_success'))
<div class="toast"
    data-title="Success!"
    data-message="Channel Day Deleted Successfully."
    data-type="warning">
</div>
@endif
@if(Session::has('saved_success'))
<div class="toast"
    data-title="Success!"
    data-message="Day Durations Saved Successfully."
    data-type="success">
</div>
@endif
<table class="table table-stripped table-hover" id="channel_table" style="width:100%;">
    <thead class="mb-res-header">
        <tr>
            <th class="mb-res-separator"></th>
            <th>Channel Name</th>
            <th>Days</th>
            <th>Status</th>
            <th>Channel Day Durations</th>
            <th style="width:100px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($channel->days as $day) 
        <tr>
            <td class="mb-res-separator"></td>
            <td class="mb-res"><span class="mb-res-left">Channel Name:</span><span class="mb-res-right">{{$day->channel->name}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Days:</span><span class="mb-res-right">{{Carbon\Carbon::parse($day->day)->format('d F Y')}}</span></td>
           
            <td class="mb-res"><span class="mb-res-left">Status:</span><span class="mb-res-right">@if($day->status == 1 )<span class='badge badge-pill badge-success'>Active</span> @else <span class='badge badge-pill badge-warning'>Disabled</span>@endif</span></td>
           
            <td class="mb-res">
                <span class="mb-res-left">Channel Day Durations:</span>
                <span class="mb-res-right">
                    <a href="{{route('day-durations',['id' => $day->id])}}">
                        <button class="btn btn-sm btn-primary">Durations</button>
                    </a>
                    <!-- <button class="btn btn-sm btn-secondary" style="display:inline-block;margin-left:20px;" onclick="duration_create({{$day->id}},'{{$day->day}}')">Create Durations</button>   -->
                </span>
            </td>
            <td class="mb-res"><span class="mb-res-left">Action:</span><span class="mb-res-right">
                <a href="{{route('day-delete',['id' => $day->id])}}"><button class="btn btn-sm btn-danger">Delete</button></a></span>
            </td>
        </tr>
        @endforeach
    </tbody>
  <!--Add New Message Fab Button-->
  </table>
  <div class="text-center" style="border:1px solid #efefef; padding:50px 0 50px 0;">
    <div class="row" id="duration_create_div" style="display:none;">
        <div class="col-md-4" style='margin:0 auto;'>
            <form action="{{route('duration-create')}}" method="post">
                <h2>Create Durations for this day</h2>
                <div class="form-group">
                    <label for="">Day:</label>
                    <input class="form-control" type="text" id="day_name" value="">
                </div>
                <div id="durations_div">
                    <div style="padding:10px 5px; border:1px solid #505050;margin-bottom:10px;">
                        <div class="form-group">
                            <label for="">Duration 1 (From):</label>
                            <input class="form-control" type="time" name="duration_from_1" id="duration_from_1" required>
                        </div>
                        <div class="form-group">
                            <label for="">Duration 1 (To):</label>
                            <input class="form-control" type="time" name="duration_to_1" id="duration_to_1" required>
                        </div>
                        <div class="form-group">
                            <label for="">Link of Duration 1:</label>
                            <input class="form-control" type="text" name="link_1" id="link_1" required>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-primary" onclick="add_durations()">add durations</button>
                @csrf
                <input type="hidden" id="day_id" name="day_id">
                <input type="hidden" name="durations" id="durations" value="1">
                <button type="submit" class="btn btn-sm btn-success"> Submit</button>
                </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#channel_table').DataTable();
} );
var durations_count = 1;
function duration_create(id,day)
{
    $('#duration_create_div').css('display','flex');
    $('#day_id').val(id);
    $('#day_name').val(day);
}
function add_durations()
{
    durations_count++;
    $('#durations').val(durations_count);
    var duration_code = `
        <div style="padding:10px 5px; border:1px solid #505050;margin-bottom:10px;">
            <div class="form-group">
                <label for="">Duration `+durations_count+` (From):</label>
                <input class="form-control" type="time" name="duration_from_`+durations_count+`" id="duration_from_`+durations_count+`" required>
            </div>
            <div class="form-group">
                <label for="">Duration `+durations_count+` (To):</label>
                <input class="form-control" type="time" name="duration_to_`+durations_count+`" id="duration_to_`+durations_count+`" required>
            </div>
            <div class="form-group">
                <label for="">Link of Duration `+durations_count+`:</label>
                <input class="form-control" type="text" name="link_`+durations_count+`" id="link_`+durations_count+`" required>
            </div>
        </div>
    `;
    $('#durations_div').append(duration_code);
}
</script>
@endsection