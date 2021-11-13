@foreach($comments as $comment)
<div class="comment">
     <a href="#">
        <img src="{{asset('img/student')}}/{{$comment->student->profile_image}}" width="40" height="40" alt="" class="userpic" />
    </a>
    <p>
        <a href="#">{{$comment->student->first_name}} {{$comment->student->last_name}} </a> Says:<br />
        {{Carbon\Carbon::parse($comment->created_at)->toFormattedDateString()}}</p>
              <p>{{$comment->comment}}</p>
            </div>
@endforeach