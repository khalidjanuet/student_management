<select name="business_administrator_id" id="business_administrator_id" class="form-control select2"  required>
    <option value="">Select Business Administrator</option>
    @foreach($business_administrators as $b)
        <option value="{{$b->id}}">{{$b->name}}</option>
    @endforeach
    
</select>