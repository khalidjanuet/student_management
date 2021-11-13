@extends('backend.layouts.master')
@section('title', 'Topic Details')
@section('styles')
<link href="{{asset('forum_css/style.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{asset('forum_css/coin-slider.css')}}" />
@endsection
@section('page_title','Forum Topic Details')
@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="content">
      <div class="content_resize">
        <div class="mainbar">
          <div class="article">
            <h2>{{$topic->heading}}</h2>
            <div class="clr"></div>
            <img src="{{asset('img/forum')}}/{{$topic->img}}" alt="" style="width:500px;margin-top:10px;">
            
            <p>
              <?php echo ($topic->description); ?>
            </p>
            <h2 style="font-weight:700;">Posted by </h2>
            <div class="user" style="margin-top:10px;">
                @if($topic->student->profile_image)
                <img class="user_avatar" style="display:inline-block;" src="{{asset('img/student')}}/{{$topic->student->profile_image}}" alt="User Image">
                @else
                <img class="user_avatar" style="display:inline-block;" src="http://localhost:8080/student_management/public/img/dummy/u1.png" alt="User Image">
                @endif
                <h3 style="font-weight:500;margin-top:5px;">{{$topic->student->first_name}} {{$topic->student->last_name}}</h3>
            </div>
            <div class="rating">
                <div class="s-36 icon-star" style="color:#FC7B00;display:inline-block;"></div>
                <div class="s-36 icon-star" style="color:#FC7B00;display:inline-block;"></div>
                <div class="s-36 icon-star" style="color:#FC7B00;display:inline-block;"></div>
                <div class="s-36 icon-star-o" style="color:#FC7B00;display:inline-block;"></div>
                <div class="s-36 icon-star-o" style="color:#FC7B00;display:inline-block;"></div>
            </div>
            <p><a href="#"><strong>Comments ({{count($topic->comments)}})</strong></a> <span>&nbsp;&bull;&nbsp;</span> {{Carbon\Carbon::parse($topic->created_at)->toFormattedDateString()}} </p>
          </div>
         
          <div class="article">
            <h2><span>{{count($topic->comments)}}</span> @if(count($topic->comments) == 1)Response @else Responses @endif</h2>
            <div class="clr"></div>
            <div id="comments_div">
            @foreach($topic->comments as $comment)
            <div class="comment">
                <a href="#">
                    <img src="{{asset('img/student')}}/{{$comment->student->profile_image}}" width="40" height="40" alt="" class="userpic" />
                </a>
                <p>
                    <a href="#">{{$comment->student->first_name}} {{$comment->student->last_name}} </a> Says:<br />
                    {{Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</p>
                    <p>{{$comment->comment}}</p>
            </div>
            @endforeach
            </div>
          </div>
          <div class="article">
            <h2><span>Leave a</span> Reply</h2>
            <div class="clr"></div>
            
              <div class="form-group" style="margin-top:20px;">
                  <label for="">Comment</label>
                  <textarea name="new_comment" class="form-control" id="new_comment" cols="30" rows="5"></textarea>
              </div>
              <div class="form-group">
                  <button class="btn btn-success" onclick="submit_comment()">Submit</button>
              </div>
          </div>
        </div>
        
        <div class="clr"></div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('scripts')
<script>
  function submit_comment()
  {
    var comment = $('#new_comment').val();
    var topic_id = "{{$topic->id}}";
    $.ajax({
                type:'GET',
                url:"{{route('topic-save-comment')}}",
                data:{'comment':comment,'topic_id': topic_id},
                success:function(data){
                  
                     $('#comments_div').html(data);
                     $('#new_comment').val('');
                   
                   
                }
		    });
  }
</script>
@endsection