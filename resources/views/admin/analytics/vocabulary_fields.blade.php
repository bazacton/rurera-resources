<div class="rurera-timeline timeline-container">
    <input type="range" name="timeline_date" id="dateRange" min="0" value="0">
    <div class="date-label" id="dateLabel"></div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="row form-group col-lg-12 col-md-12 col-sm-12 col-12">
        @if($vocabulary_list->count() > 0)
            @foreach( $vocabulary_list as $vocabularyObj)
                <div class="form-check mt-1 col-lg-4 col-md-4 col-sm-4 col-4">
                    <input type="checkbox" name="spell_ids[]" id="spell_{{$vocabularyObj->id}}" value="{{$vocabularyObj->id}}" class="form-check-input">
                    <label class="form-check-label cursor-pointer mt-0" for="spell_{{$vocabularyObj->id}}">
                        {{$vocabularyObj->getTitleAttribute()}}
                    </label>
                </div>
            @endforeach
        @endif
    </div>
</div>
