@extends('backend.layouts.master')
@section('title', 'Student')
@section('page_title','Students Fees')
@section('content')
@if(Session::has('update_success'))
<div class="toast"
    data-title="Success!"
    data-message="Student Fee Record Updated Successfully."
    data-type="warning">
</div>
@endif
<table class="table table-bordered table-hover">

    <tbody> 
    <tr>
        <td style="width:250px;">Student Image</td>
        
        <td>
            <div class="image m-3">
                <img src="{{asset('img/student')}}/{{$fee->student->profile_image}}" alt="" width="100" height="100">
            </div>
        </td>
        
       
    </tr>
    <tr>
        <td style="width:250px;">Student Name</td>
        <td>{{$fee->student->first_name}} {{$fee->student->last_name}}</td>
    </tr>
    <tr>
        <td style="width:250px;">Student Email</td>
        <td>{{$fee->student->email}}</td>
    </tr>
    
    <tr>
        <td style="width:250px;">Course</td>
        <td>{{$fee->course->name}}</td>
    </tr>
    <tr>
        <td style="width:250px;">Total Fees</td>
        <td>{{$fee->total}}</td>
    </tr>
    <tr>
        <td style="width:250px;">Discount</td>
        <td>{{$fee->discount}}</td>
    </tr>
    <tr>
        <td style="width:250px;">Net Total</td>
        <td>{{$fee->net_total}}</td>
    </tr>
    <tr>
        <td style="width:250px;">Paid Amount</td>
        <td>{{$fee->paid}}</td>
    </tr>
    <tr>
        <td style="width:250px;">Remaining</td>
        <td>{{$fee->remaining}}</td>
    </tr>
   
   
    <tr>
        <td style="width:250px;">Paid Amount</td>
        <td>{{$fee->paid}}</td>
    </tr>
    <tr>
        <td style="width:250px;">Location</td>
        <td>{{$fee->location}}</td>
    </tr>
    <tr>
        <td style="width:250px;">Reason</td>
        <td>{{$fee->reason}}</td>
    </tr>
    <tr>
        <td style="width:250px;">Due Date</td>
        <td><span class="badge badge-success">{{Carbon\Carbon::parse($fee->due_date)->format('d-m-Y')}}</span></td>
    </tr>
    <tr>
        <td style="width:250px;">Admission Officer Name</td>
        <td>{{$fee->admission_officer_name}}</td>
    </tr>
    <tr>
        <td style="width:250px;">Team Leader Name</td>
        <td>{{$fee->team_leader_name}}</td>
    </tr>
    <tr>
        <td style="width:250px;">Payment Method</td>
        <td>{{$fee->payment_method}}</td>
    </tr>
    <tr>
        <td style="width:250px;">Outside Country (Bank Name)</td>
        <td>{{$fee->outside}}</td>
    </tr>
    <tr>
        <td style="width:250px;">Message</td>
        <td>{{$fee->message}}</td>
    </tr>
    <tr>
        <td style="width:250px;">Receipt Email</td>
        <td>{{$fee->email}}</td>
    </tr>
    <tr>
        <td style="width:250px;">Receipt</td>
        <td><a href="{{asset('receipts')}}/{{$fee->receipt}}" target="_blank">{{$fee->receipt}}</td>
    </tr>

   
    </tbody>
    
</table>
@endsection

</script>