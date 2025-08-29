
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="row form-group col-lg-12 col-md-12 col-sm-12 col-12">
        @if($tests_list->count() > 0)
            @foreach( $tests_list as $testObj)
                <div class="form-check mt-1 col-lg-4 col-md-4 col-sm-4 col-4">
                    <input type="checkbox" name="tests_ids[]" id="spell_{{$testObj->id}}" value="{{$testObj->id}}" class="form-check-input">
                    <label class="form-check-label cursor-pointer mt-0" for="spell_{{$testObj->id}}">
                        {{$testObj->getTitleAttribute()}}
                    </label>
                </div>
            @endforeach
        @endif
    </div>
</div>
