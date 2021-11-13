@extends('backend.layouts.master')
@section('title', 'Links')
@section('page_title','Links')
@section('content')

  <div class="container-fluid">
    @if(Auth::user()->role == 1)
    <div class="row"> 
        <div class="col-md-8">
            <div class="form-group">
                <div class="label" style="margin-bottom:5px;font-size:16px;font-weight:600;">Student Registration Form Link:</div>
                <input type="text" id="input1" class="form-control" value="{{route('student-create')}}">
                
            </div>
        </div>
        <div class="col-md-2" style="padding-top:29px;">
        <button class="btn btn-success" style="display:inline-block;background:#ff7b00;" onclick="copy_link(1)">Copy Link</button>
        </div>
         
    </div>
    <div class="row"> 
        <div class="col-md-8">
            <div class="form-group">
                <div class="label" style="margin-bottom:5px;font-size:16px;font-weight:600;">Speaking Evaluation Form Link:</div>
                <input type="text" id="input2" class="form-control" value="{{route('speaking-evaluation-form')}}">
                
            </div>
        </div>
        <div class="col-md-2" style="padding-top:29px;">
        <button class="btn btn-success" style="display:inline-block;background:#ff7b00;" onclick="copy_link(2)">Copy Link</button>
        </div>
         
    </div>
    <div class="row"> 
        <div class="col-md-8">
            <div class="form-group">
                <div class="label" style="margin-bottom:5px;font-size:16px;font-weight:600;">Writing Evaluation Form Link:</div>
                <input type="text" id="input3" class="form-control" value="{{route('writing-evaluation-form')}}">
                
            </div>
        </div>
        <div class="col-md-2" style="padding-top:29px;">
        <button class="btn btn-success" style="display:inline-block;background:#ff7b00;"  onclick="copy_link(3)">Copy Link</button>
        </div>
         
    </div>
    <div class="row"> 
        <div class="col-md-8">
            <div class="form-group">
                <div class="label" style="margin-bottom:5px;font-size:16px;font-weight:600;">Reading Evaluation Form Link:</div>
                <input type="text" id="input4" class="form-control" value="{{route('reading-evaluation-form')}}">
                
            </div>
        </div>
        <div class="col-md-2" style="padding-top:29px;">
        <button class="btn btn-success" style="display:inline-block;background:#ff7b00;" onclick="copy_link(4)">Copy Link</button>
        </div>
         
    </div>
    <div class="row"> 
        <div class="col-md-8">
            <div class="form-group">
                <div class="label" style="margin-bottom:5px;font-size:16px;font-weight:600;">Listening Evaluation Form Link:</div>
                <input type="text" id="input5" class="form-control" value="{{route('listening-evaluation-form')}}">
                
            </div>
        </div>
        <div class="col-md-2" style="padding-top:29px;">
        <button class="btn btn-success" style="display:inline-block;background:#ff7b00;" onclick="copy_link(5)">Copy Link</button>
        </div>
         
    </div>
    <div class="row"> 
        <div class="col-md-8">
            <div class="form-group">
                <div class="label" style="margin-bottom:5px;font-size:16px;font-weight:600;">Student Attendance Form Link:</div>
                <input type="text" id="input6" class="form-control" value="{{route('attendance-form')}}">
                
            </div>
        </div>
        <div class="col-md-2" style="padding-top:29px;">
        <button class="btn btn-success" style="display:inline-block;background:#ff7b00;"  onclick="copy_link(6)">Copy Link</button>
        </div>
         
    </div>
    <div class="row"> 
        <div class="col-md-8">
            <div class="form-group">
                <div class="label" style="margin-bottom:5px;font-size:16px;font-weight:600;">Student Attendance Feedback Form Link:</div>
                <input type="text" id="input7" class="form-control" value="{{route('attendance-feedback-form')}}">
                
            </div>
        </div>
        <div class="col-md-2" style="padding-top:29px;">
        <button class="btn btn-success" style="display:inline-block;background:#ff7b00;" onclick="copy_link(7)">Copy Link</button>
        </div>
         
    </div>
    <div class="row"> 
        <div class="col-md-8">
            <div class="form-group">
                <div class="label" style="margin-bottom:5px;font-size:16px;font-weight:600;">Test Suggestion Form Link:</div>
                <input type="text" id="input8" class="form-control" value="{{route('test-suggestion-form')}}">
                
            </div>
        </div>
        <div class="col-md-2" style="padding-top:29px;">
        <button class="btn btn-success" style="display:inline-block;background:#ff7b00;" onclick="copy_link(8)">Copy Link</button>
        </div>
         
    </div>
    <div class="row"> 
        <div class="col-md-8">
            <div class="form-group">
                <div class="label" style="margin-bottom:5px;font-size:16px;font-weight:600;">Student Fees Form Link:</div>
                <input type="text" id="input9" class="form-control" value="{{route('student-fee-form')}}">
                
            </div>
        </div>
        <div class="col-md-2" style="padding-top:29px;">
        <button class="btn btn-success" style="display:inline-block;background:#ff7b00;"  onclick="copy_link(9)">Copy Link</button>
        </div>
         
    </div>
    @endif
    @if(Auth::user()->role == 3)
    <div class="row"> 
        <div class="col-md-8">
            <div class="form-group">
                <div class="label" style="margin-bottom:5px;font-size:16px;font-weight:600;">Speaking Evaluation Form Link:</div>
                <input type="text" id="input2" class="form-control" value="{{route('speaking-evaluation-form')}}">
                
            </div>
        </div>
        <div class="col-md-2" style="padding-top:29px;">
        <button class="btn btn-success" style="display:inline-block;background:#ff7b00;" onclick="copy_link(2)">Copy Link</button>
        </div>
         
    </div>
   
    <div class="row"> 
        <div class="col-md-8">
            <div class="form-group">
                <div class="label" style="margin-bottom:5px;font-size:16px;font-weight:600;">Reading Evaluation Form Link:</div>
                <input type="text" id="input4" class="form-control" value="{{route('reading-evaluation-form')}}">
                
            </div>
        </div>
        <div class="col-md-2" style="padding-top:29px;">
        <button class="btn btn-success" style="display:inline-block;background:#ff7b00;" onclick="copy_link(4)">Copy Link</button>
        </div>
         
    </div>
    <div class="row"> 
        <div class="col-md-8">
            <div class="form-group">
                <div class="label" style="margin-bottom:5px;font-size:16px;font-weight:600;">Listening Evaluation Form Link:</div>
                <input type="text" id="input5" class="form-control" value="{{route('listening-evaluation-form')}}">
                
            </div>
        </div>
        <div class="col-md-2" style="padding-top:29px;">
        <button class="btn btn-success" style="display:inline-block;background:#ff7b00;" onclick="copy_link(5)">Copy Link</button>
        </div>
         
    </div>
    @endif
   </div>
  

@endsection
@section('scripts')
<script>
function copy_link(id){
		var copyText = document.getElementById("input"+id);

		  /* Select the text field */
		copyText.select();
		copyText.setSelectionRange(0, 99999); /*For mobile devices*/

		  /* Copy the text inside the text field */
		document.execCommand("copy");

		}
</script>
@endsection