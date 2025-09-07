<div class="col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="form-group">
        <label class="input-label d-block">Mock Practice</label>
        <select name="mock_practice_id" class="form-control mock_practice_id select2 " data-placeholder="Select Mock Practice">
            <option value="">Select Mock Practice</option>
            @if($mock_tests->count() > 0)
                @foreach($mock_tests as $mockTestObj)
                    <option value="{{$mockTestObj->id}}">{{$mockTestObj->getTitleAttribute()}}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
