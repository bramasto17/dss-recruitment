@foreach($result['requirements'] as $key => $requirement)
<div class="form-group">
    <label class="col-md-3 control-label">@if($key == 0) Job Requirements @endif</label>
    <input type="hidden" name="job_requirement_id[]" id="job_requirement_id" class="select2-single form-control" value="{{$requirement['id']}}" required>
    <div class="col-md-4">
        <span>{{$requirement['name']}}</span>
    </div>
    <div class="col-md-2">
        <select class="select2-multiple form-control select-primary"
                name="job_requirement_grade[]" required>
            <option value="" selected>Grade</option>
            @foreach($grades as $grade)
                <option value="{{$grade}}">{{$grade}}</option>
            @endforeach
        </select>
    </div>
</div>
@endforeach