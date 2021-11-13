@extends('backend.layouts.master')
@section('title', 'User')
@section('page_title','Team Lead Dashboard (Business Administrators Payments)')
@section('content')
<h3 class="text-center">Team Lead Payment Info</h3>
<table class="table table-stripped table-hover" id="table1" style="width:100%;text-align:center;border-bottom:3px solid #efefef;">
    <thead class="mb-res-header">
        <tr>
        <th class="mb-res-separator"></th>
            <th>ID</th>
            <th>Team Lead</th>
            <th>Payment</th>
           
        </tr>
    </thead>
    <tbody>
        
        <tr>
        <td class="mb-res-separator"></td>
           
            <td class="mb-res"><span class="mb-res-left">ID:</span><span class="mb-res-right">{{$team_lead->id}}</span></td>
           
            <td class="mb-res"><span class="mb-res-left">Name:</span><span class="mb-res-right"><a href="">{{$team_lead->name}}</a></span></td>
            <td class="mb-res"><span class="mb-res-left">Payment:</span><span class="mb-res-right">{{$team_lead_total_payment}}</span></td>
           
           
        </tr>
    </tbody>
  <!--Add New Message Fab Button-->
  </table>
  <h3 class="text-center">Business Administrators Payment Info</h3>
<table class="table table-stripped table-hover" id="user_table" style="width:100%;text-align:center;">
    <thead class="mb-res-header">
        <tr>
        <th class="mb-res-separator"></th>
            <th>ID</th>
            <th>Business Administrator</th>
            <th>Payment</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($business_admins as $business_admin) 
        <tr>
        <td class="mb-res-separator"></td>
           
            <td class="mb-res"><span class="mb-res-left">ID:</span><span class="mb-res-right">{{$business_admin->id}}</span></td>
           
            <td class="mb-res"><span class="mb-res-left">Name:</span><span class="mb-res-right"><a href="{{route('business-admin-payments',['id' => $business_admin->id])}}">{{$business_admin->name}}</a></span></td>
            <td class="mb-res"><span class="mb-res-left">Payment:</span><span class="mb-res-right">{{$payments[$business_admin->id]}}</span></td>
           
           
        </tr>
        @endforeach
    </tbody>
  <!--Add New Message Fab Button-->
  </table>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#user_table').DataTable();
   
} );
</script>
@endsection