<label style="color:#fff;" for="">Durations:</label>
<select name="duration_id" id="duration_id_{{$day->channel->id}}" class="form-control select2">
    <option value=""> Select Duration</option>
    @foreach($day->durations as $duration)
        @if($duration->is_booked)
            <option value="{{$duration->id}}" disabled>{{Carbon\Carbon::parse($duration->from_duration)->format('H:i A') }} - {{Carbon\Carbon::parse($duration->to_duration)->format('H:i A')}} - Booked</option>
        @else
        <option value="{{$duration->id}}">{{Carbon\Carbon::parse($duration->from_duration)->format('H:i A') }} - {{Carbon\Carbon::parse($duration->to_duration)->format('H:i A')}}</option>
        @endif
    @endforeach
</select>