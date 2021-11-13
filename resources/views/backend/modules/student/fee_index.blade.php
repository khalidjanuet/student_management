@extends('backend.layouts.master')
@section('title', 'Student')
@section('page_title','Students Fees')
@section('content')
@if(Session::has('due_date_update_success'))
<div class="toast"
    data-title="Success!"
    data-message="Due Date Updated Successfully."
    data-type="success">
</div>
@endif
<form action="{{route('filter-fee')}}" method="post" style="text-align:center;">
  <h4><b>Search Fees By Due Date</b></h4>
  <label for="">From</label>
  <input type="date" name="from_date" id="from_date" class="form-control" style="display:inline-block;width:200px;margin-top:10px;" required>
  <label for="">To</label>
  <input type="date" name="to_date" id="to_date" class="form-control" style="display:inline-block;width:200px;margin-top:10px;" required>
  {{csrf_field()}}
  <button type="submit" class="btn btn-success" style="display:inline-block;width:120px;background:#ff7b00;">Search</button>
</form>
<table class="table table-stripped table-hover data-tables" style="width:100%;">
    <thead class="mb-res-header">
        <tr>
        <th class="mb-res-separator"></th>
            <th style="width: 30px">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" id="checkedAll" class="custom-control-input"><label class="custom-control-label" for="checkedAll"></label>
                </div>
            </th>
            <th>ID</th>
            <th style="width:50px;">Photo</th>
            <th>Name</th>
            <th>Type</th>
            <th>Total Fees</th>
            <th>Discount</th>
            <th>Net Total</th>
            <th>Paid</th>
            <th>Remaining</th>
            <th>Due Date</th>
            <th style="width:100px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fees as $fee) 
        <tr>
        <td class="mb-res-separator"></td>
            <td style="width: 30px" class="mb-res">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input checkSingle" id="student_id_{{$fee->student->id}}" required=""><label class="custom-control-label" for="student_id_{{$fee->student->id}}"></label>
                </div>
            </td>
            <td class="mb-res"><span class="mb-res-left">Roll #:</span><span class="mb-res-right"><a href="{{route('student-detail',['id' => $fee->student->id])}}">{{$fee->student->id}}</a></span></td>
            <td class="mb-res"><span class="mb-res-left">Image:</span><span class="mb-res-right"><a href="{{route('student-detail',['id' => $fee->student->id])}}"><img src="{{asset('img/student')}}/{{$fee->student->profile_image}}" style="width:30px;border-radius:50%;"></a></span></td>
            <td class="mb-res"><span class="mb-res-left">Name:</span><span class="mb-res-right"><a href="{{route('student-detail',['id' => $fee->student->id])}}">{{$fee->student->first_name}} {{$fee->student->last_name}}</a></span></td>
            <td class="mb-res"><span class="mb-res-left">Type:</span><span class="mb-res-right">{{$fee->reason}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Total:</span><span class="mb-res-right">{{$fee->total}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Discount:</span><span class="mb-res-right">{{$fee->discount}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Net Total:</span><span class="mb-res-right">{{$fee->net_total}}</span></td>
            <td class="mb-res" ><span class="mb-res-left">Paid:</span><span class="mb-res-right">{{$fee->paid}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Remaining:</span><span class="mb-res-right">{{$fee->remaining}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Due Date:</span><span class="mb-res-right"><span class="badge badge-success">{{Carbon\Carbon::parse($fee->due_date)->format('d-m-Y')}}</span></span></td>
            
            <td class="mb-res"><span class="mb-res-left">Action:</span><span class="mb-res-right">
                <a href="{{route('student-fee-detail',['id' => $fee->id])}}"><i class="icon-eye mr-3"></i></a>
                <a style="cursor:pointer;" onclick="show_due_date_modal({{$fee->id}})"><i class="icon-pencil mr-3"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
  <!--Add New Message Fab Button-->
  <a href="{{route('student-fee-form')}}" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i class="icon-add"></i></a>    
</table>

<div class="modal" id="edit_due_date_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Due Date</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('student-fee-change-due-date')}}" method="post">
                
                <div class="form-group">
                    <div class="label"><b>New Due Date:</b></div>
                    <input type="date" class="form-control" name="new_due_date" id="new_due_date">
                </div>
                <div class="form-group">
                    {{csrf_field()}}
                    <input type="hidden" name="fee_id" id="fee_id" value="">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
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
    function show_due_date_modal(id)
    {
        $('#fee_id').val(id);
        $('#edit_due_date_modal').modal('show');
    }
</script>
@endsection