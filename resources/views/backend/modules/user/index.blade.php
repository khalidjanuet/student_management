@extends('backend.layouts.master')
@section('title', 'User')
@section('page_title','Users List')
@section('content')
@if(Session::has('delete_success'))
<div class="toast"
    data-title="Success!"
    data-message="User Deleted Successfully."
    data-type="warning">
</div>
@endif
<table class="table table-stripped table-hover" id="user_table" style="width:100%;">
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
            <th>Email</th>
            <th>Role</th>
            <th style="width:100px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user) 
        <tr>
        <td class="mb-res-separator"></td>
            <td style="width: 30px" class="mb-res">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input checkSingle" id="user_id_{{$user->id}}" required=""><label class="custom-control-label" for="user_id_{{$user->id}}"></label>
                </div>
            </td>
            <td class="mb-res"><span class="mb-res-left">ID:</span><span class="mb-res-right">{{$user->id}}</span></td>
            <td class="mb-res"><span class="mb-res-left">Image:</span><span class="mb-res-right"><img src="{{asset('img/user')}}/{{$user->img}}" style="width:30px;border-radius:50%;"></span></td>
            @if($user->role == 3)
            <td class="mb-res"><span class="mb-res-left">Name:</span><span class="mb-res-right">{{$user->name}}</span></td>
            @elseif($user->role == 4)
            <td class="mb-res"><span class="mb-res-left">Name:</span><span class="mb-res-right"><a href="{{route('business-lead-payments',['id' => $user->id])}}">{{$user->name}}</a></span></td>
            @elseif($user->role == 5)
            <td class="mb-res"><span class="mb-res-left">Name:</span><span class="mb-res-right">{{$user->name}}</span></td>
            @elseif($user->role == 6)
            <td class="mb-res"><span class="mb-res-left">Name:</span><span class="mb-res-right"><a href="{{route('business-admin-payments',['id' => $user->id])}}">{{$user->name}}</a></span></td>
            @endif
            <td class="mb-res"><span class="mb-res-left">Email:</span><span class="mb-res-right">{{$user->email}}</span></td>
            @if($user->role == 3)
            <td class="mb-res"><span class="mb-res-left">Role:</span><span class="mb-res-right">Tutor</span></td>
            @elseif($user->role == 4)
            <td class="mb-res"><span class="mb-res-left">Role:</span><span class="mb-res-right">Business Lead</span></td>
            @elseif($user->role == 5)
            <td class="mb-res"><span class="mb-res-left">Role:</span><span class="mb-res-right">Team Lead</span></td>
            @elseif($user->role == 6)
            <td class="mb-res"><span class="mb-res-left">Role:</span><span class="mb-res-right">Business Administrator</span></td>
            @endif
            <td class="mb-res"><span class="mb-res-left">Action:</span><span class="mb-res-right">
                
                <a href="{{route('user-edit',['id' => $user->id])}}" ><i class="icon-pencil mr-3"></i></a>
                <a href="{{route('user-delete',['id' => $user->id])}}"><i class="icon-trash"></i></a></span>
            </td>
        </tr>
        @endforeach
    </tbody>
  <!--Add New Message Fab Button-->
  <a href="{{route('user-create',['type' => $type])}}" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i class="icon-add"></i></a>    
</table>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#user_table').DataTable();
} );
</script>
@endsection