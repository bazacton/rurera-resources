<div class="col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="form-group">
        <label class="input-label d-block">Assignment</label>
        <select name="assignment_id" class="form-control assignment_id select2 " data-placeholder="Select Assignment">
            <option value="">Select Assignment</option>
            @if($assignments->count() > 0)
                @foreach($assignments as $assignmentObj)
                    <option value="{{$assignmentObj->id}}">{{$assignmentObj->title}}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
