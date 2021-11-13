@extends('backend.layouts.master')
@section('title', 'User')
@section('page_title','Business Administrator Dashboard (Students Payments)')
@section('content')
<h3 class="text-center">Business Admin: {{$business_admin->name}}</h3>
<table class="table table-stripped table-hover" id="user_table" style="width:100%;text-align:center;">
    <thead class="mb-res-header">
        <tr>
        <th class="mb-res-separator"></th>
            <th>ID</th>
            <th>Student Name</th>
            <th>Payment</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student) 
        <tr>
        <td class="mb-res-separator"></td>
           
            <td class="mb-res"><span class="mb-res-left">ID:</span><span class="mb-res-right">{{$student->id}}</span></td>
           
            <td class="mb-res"><span class="mb-res-left">Name:</span><span class="mb-res-right">{{$student->student->first_name}} {{$student->student->last_name}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Payment:</span><span class="mb-res-right">{{$student->paid}}</span></td>
           
           
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