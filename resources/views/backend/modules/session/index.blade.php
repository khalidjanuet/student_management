@extends('backend.layouts.master')
@section('title', 'Modules')
@section('page_title','Modules List')
@section('content')
@if(Session::has('saved_success'))
<div class="toast"
    data-title="Success!"
    data-message="Modules Created Successfully."
    data-type="success">
</div>
@endif
@if(Session::has('update_success'))
<div class="toast"
    data-title="Success!"
    data-message="Modules Updated Successfully."
    data-type="success">
</div>
@endif
@if(Session::has('delete_success'))
<div class="toast"
    data-title="Success!"
    data-message="Modules Deleted Successfully."
    data-type="danger">
</div>
@endif

<table class="table table-stripped table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
    <thead class="mb-res-header">
        <tr>
        <th class="mb-res-separator"></th>
            <th style="width:300px;">Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody> 
        @foreach($sessions as $session)
            <tr>
            <td class="mb-res-separator"></td>
            <td class="mb-res" style="width:300px;">
                <span class="mb-res-left">Name:</span>
                <span class="mb-res-right">
                    <form method="post" action="{{route('session-update')}}">
                        <input type="text" class="form-control" name="name" value="{{$session->name}}" style="width:150px;display:inline-block;">
                        <input type="hidden" name="session_id" value="{{$session->id}}">
                        
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-success" style="display:inline-block;margin-left:10px;margin-top:-3px;">Update</button>
                    </form>
                </span>
            </td>
            <td class="mb-res"><span class="mb-res-left">Action:</span><span class="mb-res-right"><a href="{{route('session-delete',['id' => $session->id])}}"><i class="icon-trash"></i></a></span></td>
            </tr>
        @endforeach
    </tbody>
  <!--Add New Message Fab Button-->
  <a class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary" onclick="$('#session_create_modal').modal('show');" style="cursor:pointer;"><i class="icon-add"></i></a>    
</table>
<div class="modal" id="session_create_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="max-width: 650px;">
    <div class="modal-content" style="border-radius:1rem;">
       <div class="modal-header">
       <h5 class="modal-title">New Modules</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center" >
       <form action="{{route('session-save')}}" method="post">
            <div class="form-group " style="text-align:left;">
                <input type="text" class="form-control" name="name" id="name" placeholder="Module Name" value="{{old('name')}}">
                   @if($errors->first('name'))
									    <p class="text-danger">{{$errors->first('name')}}</p>
								    @endif
                {{csrf_field()}}
                <button type="submit" class="btn btn-success" style="margin-top:10px;">Create</button>
            </div>
       </form>
     </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>
<div class="modal" id="session_error" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="max-width: 650px;">
    <div class="modal-content" style="border-radius:1rem;">
       <div class="modal-header">
       <h5 class="modal-title">Duplicate Module Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center" >
        @if($errors->first('name'))
       <h3 class="text-danger">{{$errors->first('name')}}</h3>
       @endif
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
 @if($errors->first('name'))
       $('#session_error').modal('show');
@endif
</script>
@endsection