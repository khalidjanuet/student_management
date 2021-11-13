<div class="label">Modules:</div>
<select class="form-control select2" name="session_id" id="session_id" required>
    <option value="0">Select Module</option>
    @foreach($modules as $module)
        <option value="{{$module}}">{{$module}}</option>
    @endforeach
</select>
@if($errors->first('session'))
    <p class="text-danger">{{$errors->first('session')}}</p>
@endif