@extends('backend.layouts.master')
@section('title', 'Zoom')
@section('page_title','Zoom Channels List')
@section('content')
@if(Session::has('saved_success'))
<div class="toast"
    data-title="Success!"
    data-message="Channel Days Created Successfully."
    data-type="success">
</div>
@endif
@if(Session::has('disabled_success'))
<div class="toast"
    data-title="Success!"
    data-message="Channel Disabled Successfully."
    data-type="warning">
</div>
@endif
<table class="table table-stripped table-hover" id="channel_table" style="width:100%;">
    <thead class="mb-res-header">
        <tr>
            <th class="mb-res-separator"></th>
            <th>Name</th>
            <th>Status</th>
            <th>Channel Total Days</th>
            <th style="width:100px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($channels as $channel) 
        <tr>
            <td class="mb-res-separator"></td>
            
          
            <td class="mb-res"><span class="mb-res-left">Name:</span><span class="mb-res-right">{{$channel->name}}</span></td>
           
            <td class="mb-res"><span class="mb-res-left">Status:</span><span class="mb-res-right">@if($channel->status == 1 )<span class='badge badge-pill badge-success'>Active</span> @else <span class='badge badge-pill badge-warning'>Disabled</span>@endif</span></td>
           
            <td class="mb-res">
                <span class="mb-res-left">Channels Total Days:</span>
                <span class="mb-res-right">
                    <a href="{{route('channel-days',['id' => $channel->id])}}"><button class="btn btn-sm btn-primary">Show Days</button></a>
                    <button class="btn btn-sm btn-secondary" style="display:inline-block;margin-left:20px;" onclick="day_create({{$channel->id}},'{{$channel->name}}')">Create Days</button>  
                </span>
            </td>
            <td class="mb-res"><span class="mb-res-left">Action:</span><span class="mb-res-right">
                  
                <a href="{{route('channel-disable',['id' => $channel->id])}}"><button class="btn btn-sm btn-danger" >Disable</button></a></span>
            </td>
        </tr>
        @endforeach
    </tbody>
  <!--Add New Message Fab Button-->
  </table>

<div class="modal" id="day_create_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="max-width: 650px;">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Zoom Channel Days Creation Modal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body text-center" >
        <div class="text-center" style="border:1px solid #efefef; padding:50px 0 50px 0;">
            <div class="row">
                    <div class="col-md-4" style='margin:0 auto;'>
                        <form action="{{route('day-create')}}" method="post">
                            <h2>Create Days for this channel</h2>
                            <div class="form-group">
                                <label for="">Channel:</label>
                                <input class="form-control" type="text" id="channel_name" value="">
                            </div>
                            <div id="days_div">
                                <div class="form-group">
                                    <label for="">Day 1:</label>
                                    <input class="form-control" type="date" name="day_1" id="day_1">
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-primary" onclick="add_days()">add days</button>
                            @csrf
                            <input type="hidden" id="channel_id" name="channel_id">
                            <input type="hidden" name="days" id="days" value="1">
                            <button type="submit" class="btn btn-sm btn-success"> Submit</button>
                            </form>
                    </div>
                </div>
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
    var days_count = 1;
$(document).ready(function() {
    $('#channel_table').DataTable();
} );
function day_create(id,name)
{
    $('#day_create_modal').modal('show');
    $('#channel_id').val(id);
    $('#channel_name').val(name);
}
function add_days()
{
    days_count++;
    $('#days').val(days_count);
    var day_code = `<div class="form-group">
                <label for="">Day `+days_count+`:</label>
                <input class="form-control" type="date" name="day_`+days_count+`" id="day_`+days_count+`">
            </div>`;
    $('#days_div').append(day_code);
}
</script>
@endsection